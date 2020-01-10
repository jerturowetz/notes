# Cheat sheet: Windows

## Run a system file check (SFC) both before and after DISM

Run cmd as Administrator, then either

    sfc /verifyonly # verify only (dry-run)
    sfc /scannow # verify and repair the OS

## Deployment Image Servicing and Management (DISM)

This command line tool services a Windows image or prepares a Windows Preinstallation Environment (Windows PE) image.

Run cmd as Administrator, then

    DISM /Online /Cleanup-Image /CheckHealth # checks for flags of corrupted
    DISM /Online /Cleanup-Image /ScanHealth # Scans health (doesnt fix)
    DISM /Online /Cleanup-Image /RestoreHealth # Scans & repairs (recommended) - takes 15 to 30 mins

## Power managment reports

I was having trouble with sleep on the XPS9360 and came across these cool commands which do a study on sleep and sych.

Run cmd as Administrator

    powercfg /requests      # see what drivers or software are interrupting sleep
    powercfg /sleepstudy    # do a sleep study and export to an html file
    powercfg /energy        # do an energy audit and export to an html file

## Erase explorer history

Easiest to save as a `.bat` file and just run it

    Del /F /Q %APPDATA%\Microsoft\Windows\Recent\*
    Del /F /Q %APPDATA%\Microsoft\Windows\Recent\AutomaticDestinations\*
    Del /F /Q %APPDATA%\Microsoft\Windows\Recent\CustomDestinations\*
    REG Delete HKCU\SOFTWARE\Microsoft\Windows\CurrentVersion\Explorer\RunMRU /VA /F
    REG Delete HKCU\SOFTWARE\Microsoft\Windows\CurrentVersion\Explorer\TypedPaths /VA /F

## Reset the NavPane registry settings

Last time I had issue with windows explorer opening a new windows every time I double clicked a folder, deleting the following key solved the issue:

    HKEY_CURRENT_USER\SOFTWARE\Microsoft\Windows\CurrentVersion\Explorer\Modules\NavPane

## Remove drive letter for system created volumes

    diskpart
    list volume
    select volume <number of your volume>
    remove letter=<drive letter of your volume>
    exit
