pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/CarlosVP120/ToDo-CI-CD-Pipeline' 
            }
        }

        stage('Build and Test') {
            steps {
                sh 'docker build -t my-app:latest .' 
                sh 'docker run --rm my-app:latest php Test/tests.php' 
            }
        }

        stage('Deploy') {
            steps {
                script {
                    if (currentBuild.result == 'SUCCESS') {
                        sh 'docker tag my-app:latest tu_usuario/my-app:latest' 
                        sh 'docker push tu_usuario/my-app:latest' 
                    }
                }
            }
        }
    }
}
