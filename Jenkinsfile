pipeline {
    agent any
    stages {
        stage('Cleanup Workspace') {
            steps {
                cleanWs()  // Ensures workspace is clean before new checkout
            }
        }
        stage('Checkout Code') {
            steps {
                checkout scm  // Fetches the latest code from your SCM
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
                    // Ensures no old Docker containers are affecting the new build
                    sh '''
                        CONTAINER_IDS=$(docker ps -a -q --filter "label=project=gsb_covoiturage")
                        if [ ! -z "$CONTAINER_IDS" ]; then
                            docker rm -f $CONTAINER_IDS
                        fi
                    '''
                }
            }
        }
        // stage("Prepare Docker Environment") {
        //     steps {
        //         script {
        //             // Builds the Docker image ensuring no cache is used, reflects latest code changes
        //             dir("${env.WORKSPACE}") {
        //                 sh 'docker-compose -f docker-compose.jenkins.yml build --no-cache'
        //             }
        //         }
        //     }
        // }
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
        stage('Clear Config and Cache') {
            steps {
                script {
                    // Clears Laravel's configuration cache before running tests
                    sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan optimize:clear'
                    sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan config:clear'
                    sh 'docker-compose -f docker-compose.jenkins.yml run --rm app php artisan cache:clear'
                }
            }
        }
        stage("Run Tests") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        // Ensures tests are run with the testing environment configuration
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
                    // Maintains containers for inspection if needed, useful for debugging
                    echo 'Skipping docker-compose down to keep containers running'
                    sh 'docker-compose -f docker-compose.jenkins.yml ps'
                }
            }
        }
    }
}
