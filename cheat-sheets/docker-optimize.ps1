docker system prune -a -f
net stop com.docker.service
taskkill /F /IM "Docker Desktop.exe"
stop-vm DockerDesktopVM
Optimize-VHD -Path "C:\Users\All Users\DockerDesktop\vm-data\DockerDesktop.vhdx" -Mode Full
Optimize-VHD -Path "C:\ProgramData\DockerDesktop\vm-data\DockerDesktop.vhdx" -Mode Full
Optimize-VHD -Path "C:\`$windows.~bt\NewOS\Users\All Users\DockerDesktop\vm-data\DockerDesktop.vhdx" -Mode Full
start-vm DockerDesktopVM
start "C:\Program Files\Docker\Docker\Docker Desktop.exe"
net start com.docker.service
