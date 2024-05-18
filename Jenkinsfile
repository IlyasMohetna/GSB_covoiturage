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
        stage("Clear application containers") {
            steps {
                script {
                    try {
                        sh 'docker rm -f $(docker ps -a -q --filter "label=project=gsb_covoiturage")'
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
