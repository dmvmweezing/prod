node {
    
    stage("Git Clone"){

        git credentialsId: 'GIT_HUB_CREDENTIALS', url: 'https://github.com/rahulwagh/spring-boot-docker.git'
    }

    
    stage("Docker build"){
        sh 'docker version'
        sh 'docker build -t prodrest01 -f makeprodrest01 .'
        sh 'docker build -t prodrest02 -f makeprodrest02 .'
        sh 'docker build -t webservice -f makewebsite .'
        sh 'docker image list'
    } 
    

    stage("SSH Into k8s Server") {
        def remote = [:]
        remote.name = 'weezingpc01'
        remote.host = '172.0.0.10'
        remote.user = 'dmvm'
        remote.password = 'Weezing01'
        remote.allowAnyHosts = true
        remote.pty = true 
        
        stage('YAML file master kopiëren') {
            sshPut remote: remote, from: 'yamlfiles/rest01-prodv01.yaml', into: '/home/dmvm/yaml'
            sshPut remote: remote, from: 'yamlfiles/rest02-prodv01.yaml', into: '/home/dmvm/yaml'
            sshPut remote: remote, from: 'yamlfiles/tws-prodv01.yaml', into: '/home/dmvm/yaml'
        } 
        
        stage('Deploy op master') {
            sshCommand remote: remote, command: "sudo kubectl apply -f /home/dmvm/yaml/rest01-prodv01.yaml", sudo: 'true'
            sshCommand remote: remote, command: "sudo kubectl apply -f /home/dmvm/yaml/rest02-prodv01.yaml", sudo: 'true'
            sshCommand remote: remote, command: "sudo kubectl apply -f /home/dmvm/yaml/tws-prodv01.yaml", sudo: 'true'
        }       
        
    }

}
