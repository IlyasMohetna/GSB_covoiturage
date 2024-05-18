pipeline {
    agent any

    stages {
        stage('Prepare Environment') {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        // Display current workspace and contents
                        sh 'echo "Current workspace path: $(pwd)"'
                        sh 'ls -la'
                        // Copy the .env file to the workspace
                        sh 'cp /var/jenkins_home/workspace/.env ${env.WORKSPACE}/.env'
                    }
                }
            }
        }

        stage("Verify Docker Setup") {
            steps {
                // Display Docker and Docker Compose versions to ensure correct tooling
                sh '''
                    docker info
                    docker version
                    docker-compose version
                '''
            }
        }

        stage("Start and Verify Docker Environment") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        // Start up the Docker containers
                        sh 'docker-compose -f docker-compose.jenkins.yml up -d'
                        // Verify the running containers
                        sh 'docker-compose -f docker-compose.jenkins.yml ps'
                        // Inspect the Docker environment within the app container
                        sh 'docker-compose -f docker-compose.jenkins.yml run --rm app bash -c "ls -la /var/www && echo Current user: $(whoami) && echo User home: $(echo ~)"'
                    }
                }
            }
        }

        stage("Run Composer and Tests") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        // Install dependencies via Composer
                        sh 'docker-compose -f docker-compose.jenkins.yml run --rm app composer install'
                        // Run tests
                        sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan test'
                    }
                }
            }
        }
    }

    post {
        always {
            script {
                dir("${env.WORKSPACE}") {
                    // Take down Docker containers and remove orphans
                    sh 'docker-compose -f docker-compose.jenkins.yml down --remove-orphans -v'
                    // Optionally list remaining Docker processes
                    sh 'docker-compose -f docker-compose.jenkins.yml ps'
                }
            }
        }
    }
}
