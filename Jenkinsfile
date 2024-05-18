pipeline {
    agent any
    stages {
        stage('Cleanup Workspace') {
            steps {
                cleanWs()
            }
        }
        stage('Checkout Code') {
            steps {
                checkout scm
            }
        }
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
                    def envFilePath = '/var/jenkins_home/workspace/.env' // Ensure this path is correct
                    def targetPath = "${env.WORKSPACE}/.env"
                    sh "cp \"${envFilePath}\" \"${targetPath}\""
                }
            }
        }
        stage("Clear application containers") {
            steps {
                script {
                    sh '''
                        CONTAINER_IDS=$(docker ps -a -q --filter "label=project=gsb_covoiturage")
                        if [ ! -z "$CONTAINER_IDS" ]; then
                            docker rm -f $CONTAINER_IDS
                        else
                            echo "No containers to remove"
                        fi
                    '''
                }
            }
        }
        stage('Show workspace content') {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'ls -la'
                    }
                }
            }
        }
        stage("Start Docker") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'docker-compose -f docker-compose.jenkins.yml up -d'
                        sh 'docker-compose -f docker-compose.jenkins.yml ps'
                    }
                }
            }
        }
        stage('List Docker Volume Contents') {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'docker-compose -f docker-compose.jenkins.yml run --rm app ls -la /var/www'
                    }
                }
            }
        }
        // stage("Run Composer Install") {
        //     steps {
        //         script {
        //             dir("${env.WORKSPACE}") {
        //                 sh 'docker-compose -f docker-compose.jenkins.yml run --rm app composer install'
        //             }
        //         }
        //     }
        // }
        stage('Clear Config and Cache') {
            steps {
                script {
                    sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan optimize:clear'
                    sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan config:cache --env=testing'
                    sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan config:clear --env=testing'
                    sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan cache:clear'
                }
            }
        }
        stage("Run Tests") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan test --env=testing'
                    }
                }
            }
        }
    }
    post {
        always {
            script {
                dir("${env.WORKSPACE}") {
                    echo 'Skipping docker-compose down to keep containers running'
                    sh 'docker-compose -f docker-compose.jenkins.yml ps'
                }
            }
        }
    }
}
