pipeline {
    agent any
    stages {
        // stage('Cleanup Workspace') {
        //     steps {
        //         cleanWs()  // Ensures workspace is clean before new checkout
        //     }
        // }
        // stage('Checkout Code') {
        //     steps {
        //         checkout scm  // Fetches the latest code from your SCM
        //     }
        // }
        stage("Verify tooling") {
            steps {
                sh '''
                    docker info
                    docker version
                    docker compose version
                '''
            }
        }
        // stage('Populate .env file') {
        //     steps {
        //         script {
        //             def envFilePath = '/var/lib/docker/volumes/jenkins_home/_data/workspace/GSB_COVOITURAGE/.env' // Ensure this path is correct
        //             def targetPath = "${env.WORKSPACE}/.env"
        //             sh "cp \"${envFilePath}\" \"${targetPath}\""
        //         }
        //     }
        // }
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
        stage('Show workspace content') {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'ls -la'
                    }
                }
            }
        }
        // stage("Prepare Docker Environment") {
        //     steps {
        //         script {
        //             // Builds the Docker image ensuring no cache is used, reflects latest code changes
        //             dir("${env.WORKSPACE}") {
        //                 sh 'docker compose -f docker compose.jenkins.yml build --no-cache'
        //             }
        //         }
        //     }
        // }
        stage("Start Docker") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        sh 'docker-compose -f docker-compose.jenkins.yml down --remove-orphans -v'  // Ensure containers and volumes are removed
                        // sh 'docker compose -f docker compose.jenkins.yml build --no-cache'  // Rebuild images without cache
                        // // sh 'docker compose -f docker compose.jenkins.yml up -d'
                        // sh 'docker compose -f docker compose.jenkins.yml up -d --force-recreate'
                        // ok
                        sh 'docker compose -f docker-compose.jenkins.yml up -d --build'
                        sh 'docker compose -f docker-compose.jenkins.yml ps'
                    }
                }
            }
        }
        // stage("Run Composer Install") {
        //     steps {
        //         script {
        //             dir("${env.WORKSPACE}") {
        //                 sh 'docker compose -f docker compose.jenkins.yml run --rm app composer install'
        //             }
        //         }
        //     }
        // }
        stage('Clear Config and Cache') {
            steps {
                script {
                    // Clears Laravel's configuration cache before running tests
                    sh 'docker compose -f docker-compose.jenkins.yml run --rm app php artisan optimize:clear'
                    sh 'docker compose -f docker-compose.jenkins.yml run --rm app php artisan config:clear'
                    sh 'docker compose -f docker-compose.jenkins.yml run --rm app php artisan cache:clear'
                }
            }
        }
        stage("Run Tests") {
            steps {
                script {
                    dir("${env.WORKSPACE}") {
                        // Ensures tests are run with the testing environment configuration
                        sh 'docker compose -f docker compose.jenkins.yml run --rm app php artisan test --env=testing'
                    }
                }
            }
        }
        stage('Deploy to Production') {
            when {
                expression { currentBuild.result == null || currentBuild.result == 'SUCCESS' }
            }
            steps {
                script {
                    sh 'echo "Deploying to production"'
                    sh 'docker compose -f docker compose.prod.yml -p gsbcovoiturage_production up -d --force-recreate'
                }
            }
        }
    }
    post {
        always {
            script {
                dir("${env.WORKSPACE}") {
                    // OK
                    sh 'docker compose -f docker compose.jenkins.yml down --remove-orphans -v'
                    sh 'docker compose -f docker compose.prod.yml down --remove-orphans -v'
                    sh 'docker compose -f docker compose.jenkins.yml ps'
                }
            }
        }
    }
}
