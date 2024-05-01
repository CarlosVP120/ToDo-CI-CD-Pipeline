pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/CarlosVP120/ToDo-CI-CD-Pipeline'  # Reemplaza con la URL de tu repositorio
            }
        }

        stage('Build and Test') {
            steps {
                sh 'docker build -t my-app:latest .'  # Construir la imagen Docker
                sh 'docker run --rm my-app:latest php Test/tests.php'  # Ejecutar pruebas
            }
        }

        stage('Deploy') {
            steps {
                script {
                    if (currentBuild.result == 'SUCCESS') {
                        sh 'docker tag my-app:latest tu_usuario/my-app:latest'  # Etiquetar la imagen
                        sh 'docker push tu_usuario/my-app:latest'  # Publicar la imagen en Docker Hub
                    }
                }
            }
        }
    }
}
