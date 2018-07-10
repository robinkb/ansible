# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    config.vm.box = "fedora/28-cloud-base"
    config.vm.box_check_update = true

    config.vm.define "testbox", primary: true do |testbox|
        testbox.vm.hostname = "testbox"
    end

    config.vm.provider :libvirt do |libvirt|
        libvirt.cpus = 2
        libvirt.memory = 2048
        libvirt.video_type = "qxl"
    end

    # Deploy personal SSH public key to machines
    # Add the following configuration to your ~/.ssh/config:
    #
    # Host *.local
    #   User vagrant
    #   StrictHostKeyChecking no
    #   UserKnownHostsFile /dev/null

    config.ssh.insert_key = false
    config.ssh.private_key_path = [
        "~/.ssh/id_rsa",
        "~/.vagrant.d/insecure_private_key"
    ]

    config.vm.provision "file", source: "~/.ssh/id_rsa.pub", destination: ".ssh/authorized_keys"

    # Avahi enables resolving the machine as <hostname>.local
    config.vm.provision "shell", inline: <<-EOF
        dnf install -y avahi python2
        systemctl start avahi-daemon.service
        sed -i.bak 's/.*swap.*//' /etc/fstab
        swapoff --all
    EOF
end
