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
                sh 'docker-compose up -d'
                sh 'docker-compose ps'
            }
        }
        stage('List Workspace Contents') {
            steps {
                sh 'ls -la "/var/jenkins_home/workspace/GSB Covoiturage CICD"'
            }
        }
        stage("Run Composer Install") {
            steps {
                sh 'docker-compose run --rm app composer install'
            }
        }
        stage("Run Tests") {
            steps {
                sh 'docker-compose run --rm app php artisan test'
            }
        }
    }
    post {
        always {
            sh 'docker-compose down --remove-orphans -v'
            sh 'docker-compose ps'
        }
    }
}
