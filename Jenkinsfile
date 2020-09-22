pipeline {
    agent any
    stages {
        stage('build') {
            steps {
                echo 'Hello world!'
            }
        }
        stage('check out') {
            steps {
                git credentialsId: 'github', url: 'https://github.com/Slowbroer/workerman-console.git'            
            }
        }
        stage('Composer Install') {
            steps {
                sh 'composer install'
            }
        }
    }
}