pipeline {
    agent any
    stages {
        stage("Verify tooling") {
            steps {
                sh '''
                    docker info
                    docker version
                    docker-compose version
                '''
            }
        }
        stage('Populate .env file') {
            steps {
                script {
                    def envFilePath = '/var/jenkins_home/workspace/.env'
                    def targetPath = "${env.WORKSPACE}/.env"
                    sh "cp \"${envFilePath}\" \"${targetPath}\""
                }
            }
        }
        stage("Clear application containers") {
            steps {
                script {
                    try {
                        sh '''
                            CONTAINER_IDS=$(docker ps -a -q --filter "label=project=gsb_covoiturage")
                            if [ ! -z "$CONTAINER_IDS" ]; then
                                docker rm -f $CONTAINER_IDS
                            else
                                echo "No containers to remove"
                            fi
                        '''
                    } catch (Exception e) {
                        echo 'No running container to clear up...'
                    }
                }
            }
        }
        stage("Start Docker") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'docker-compose up -d'
                        sh 'docker-compose ps'
                    }
                }
            }
        }
        stage('List Docker Volume Contents') {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'docker-compose run --rm app ls -la /var/www'
                    }
                }
            }
        }
        stage('Verify Directory') {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'pwd'
                        sh 'ls -la'
                    }
                }
            }
        }
        stage("Run Composer Install") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        // Using the custom docker-compose file for Jenkins
                        sh 'docker-compose -f docker-compose.jenkins.yml run --rm app composer install'
                    }
                }
            }
        }
        stage("Run Tests") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'docker-compose run --rm app php artisan test'
                    }
                }
            }
        }
    }
    post {
        always {
            script {
                dir("${env.WORKSPACE}") {
                    sh 'docker-compose down --remove-orphans -v'
                    sh 'docker-compose ps'
                }
            }
        }
    }
}
