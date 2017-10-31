#!/usr/bin/env bash
#!/bin/bash
# Cheat sheet : Bash

## The Stack

dirs -v
pushd .
pushd /newfoldertogoto
popd

## Variables in the stack

cd ~1
ls ~1
echo ~1
cp ~1/filename.ext .
mv ~1/filename.ext newname.ext

## list all folders hidden and otherwise
ls -ald .*/ */

## rsync some stuff
rsync -avr --exclude 'client_area*' codycaissie@67.205.172.59:public_html_redirect/ .

## Command history

history 		# show command history
!# 				# runs a command from history
!cl 			# runs the most recent comman that starts with those letters (sketchy)
!cl:p			# SHOW the most recent comman that starts with those letters (not sketchy)

!! 				# last command
something !! 	# @ something then the last command (useful for sudo before something)

!:1 !:3 		# reuse arguments from last commanDS
echo !:1 !:3 	# echo reuse arguments from last commanDS

!#:# 			# combine the comand and argument wildcards for cool stuff
echo !44:1 		# echo give me argument 1 from command 44 in the history

## Meta keys

alt 0 		# copy last command
alt 1 		# copy last argument 1
ctrl-alt-y 	# yank! paste from the clipboard

## Scripting tricks

apt-get --assume-yes update                                       # avoid confirms [y/N] with --assume-yes
sudo DEBIAN_FRONTEND=noninteractive apt-get update                # DEBIAN_FRONTEND=noninteractive avoid confirms
sudo DEBIAN_FRONTEND=noninteractive apt-get --assume-yes update   # combining both might be redundant but am unsure
