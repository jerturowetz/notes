#!/bin/bash

## Bash, loop through folders

# Loops trough D and then you can do whatever
for D in *; do
    if [ -d "${D}" ]; then
        echo "${D}"
    fi
done

# Or, if your action is a single command, this is more concise
for D in *; do [ -d "${D}" ] && my_command; done

# Or an even more concise version (thanks @enzotib). Note that in this version each value of D will have a trailing slash
for D in */; do my_command; done
