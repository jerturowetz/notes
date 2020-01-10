#!/bin/bash
# Cheat sheet: ssh

## Generate keys

ssh-keygen -t rsa -b 4096 -C "webdev@bkdsn.com"

## Adding keys

### Preferred method
ssh-copy-id user@server

### if authorized_keys file doesnt exist yet
scp ~/.ssh/YOURKEY.pub USERNAME@SERVER:.ssh/authorized_keys

### if authorized_keys file exists
cat ~/.ssh/YOURKEY.pub | ssh USERNAME@SERVER "cat >> ~/.ssh/authorized_keys"

## Auto-launching ssh-agent and saving credentials
# There are 2 components here.  First, install git-credential-winstore which will save your git passwords on the local machine.  There's nothing to config.
# Second, edit the ~/.profile or ~/.bashrc file to set git bash to run ssh-agent automatically when it opens.  Here's an example of my .profile file:

declare -x SSH_ENV="$HOME/.ssh/environment"

# start the ssh-agent
function start_agent {
    echo "Initializing new SSH agent..."
    # spawn ssh-agent
    ssh-agent | sed 's/^echo/#echo/' > "$SSH_ENV"
    echo succeeded
    chmod 600 "$SSH_ENV"
    . "$SSH_ENV" > /dev/null
    ssh-add ~/.ssh/bkdsn5
    ssh-add ~/.ssh/jer_precision_690
}

# test for identities
function test_identities {
    # test whether standard identities have been added to the agent already
    ssh-add -l | grep "The agent has no identities" > /dev/null
    if [ $? -eq 0 ]; then
        ssh-add ~/.ssh/bkdsn5
        ssh-add ~/.ssh/jer_precision_690
        # $SSH_AUTH_SOCK broken so we start a new proper agent
        if [ $? -eq 2 ];then
            start_agent
        fi
    fi
}

# check for running ssh-agent with proper $SSH_AGENT_PID
if [ -n "$SSH_AGENT_PID" ]; then
    ps -f -u $USERNAME | grep "$SSH_AGENT_PID" | grep ssh-agent > /dev/null
    if [ $? -eq 0 ]; then
  test_identities
    fi
else
    if [ -f "$SSH_ENV" ]; then
    . "$SSH_ENV" > /dev/null
    fi
    ps -f -u $USERNAME | grep "$SSH_AGENT_PID" | grep ssh-agent > /dev/null
    if [ $? -eq 0 ]; then
        test_identities
    else
        start_agent
    fi
fi
