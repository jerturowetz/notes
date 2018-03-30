# Cheat sheet : Docker

On older systems where docker can't run natively and instead requires docker-toolkit, docker-toolkit will install and run docker engine on top of virtualbox. You can use the following command to access/mess with this vm:

docker-machine

docker-machine ls
docker-machine rm my-docker-machine




In the elevated Command Prompt

    bcdedit /set hypervisorlaunchtype auto
    bcdedit /set hypervisorlaunchtype off

Open Powershell as admin

    Enable-WindowsOptionalFeature -Online -FeatureName Microsoft-Hyper-V –All
    Disable-WindowsOptionalFeature -Online -FeatureName Microsoft-Hyper-V-All

In the elevated Command Prompt

    dism.exe /Online /Enable-Feature:Microsoft-Hyper-V /All
    dism.exe /Online /Disable-Feature:Microsoft-Hyper-V-All
    dism.exe /Online /Disable-Feature:Microsoft-Hyper-V

While there is no way to enable the hibernate or sleep feature while the hyper-v service is running, you can control when the service is started by changing Start parameter of the hvboot service -
[HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\hvboot]


The Start property of a service can have the following values: 0=Boot, 1=System, 2=Auto, 3=Demand, 4=Disabled.

Set the value to 3, so that you can start the service when you want. 0 is not supported for hvboot.

Reboot the server. Hibernate and sleep should now be enabled for you till the time you start the hvboot service.



However, now if you try to start a virtual server in the hyper-v console you will get an error saying that the hyper-v service is not running and you will have to start it manually using the net start command. To do this, start command prompt under administrator privileges and execute the following command to start the service.

net start hvboot

Now you should be able to start your virtual machines. However, as a side effect hibernate and sleep will be disabled till you restart you machine.

___ 

Tweaking with the registry can be dangerous so for those who want a safe alternative, you can use the following command to set the Start property of the hvboot service as well -

sc config hvboot start= demand

The other values that you can use are system, auto, demand and disabled. Boot is not supported. 
Also, note that space between = and demand. The syntax of service config requires this space. 

___




$vmNetAdapter = Get-VMNetworkAdapter -ManagementOS -SwitchName DockerNAT
Get-NetAdapter "vEthernet (DockerNAT)" | 
   ? { $_.DeviceID -ne $vmNetAdapter.DeviceID } | 
   Disable-NetAdapter -Confirm:$False -PassThru | 
   Rename-NetAdapter -NewName "OLD"

IntraWA

