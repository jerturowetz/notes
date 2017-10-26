# Cheat sheet : sshpass

Note: sshpass works with ssh too but i needed to learn to use specifically with WPEngine keyless sftp access, so all the examples below use SFTP

## Define a password globally, then use the password

    export SSHPASS=your-password-here
    sshpass -e sftp user@host

## Passing options

Any ssh option can be passed by leading with -o. Check it out:

    sshpass sftp -oStrictHostKeyChecking=no user@host
    sshpass sftp -oPort=2222 user@host
    sshpass sftp -oBatchMode=no user@host

Or put some cool stuff in a script

    sshpass sftp -b - user@host << !
        cd incoming
        put your-log-file.log
        bye
    !

## Example script

    SSHPASS=your-password-here
    sshpass -e sftp -oStrictHostKeyChecking=no -oBatchMode=no -oPort=2222 -b - user@host << !
        cd incoming
        put your-log-file.log
        bye
    !
