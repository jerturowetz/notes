#!/usr/bin/env bash
#!/bin/bash
# Cheat sheet : Bash

## Copy all _contents_ from one folder to another
## the `-a` option preserves permissions and recursive stuff

cp -a ~/source/. ~/dest/
mv  -v ~/Downloads/* ~/Videos/

## Symbolic links

sudo ln -s /usr/local/nginx/conf/ /etc/nginx    # symlink a folder

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

## Scheduling scripts on Windows
C:\Windows\System32\cmd.exe /c ""%PROGRAMFILES%\Git\bin\bash.exe" --login -i -- C:\Users\jturo\daily-scripts.sh"




# Cheat sheet : globs

In computer programming, in particular in a Unix environment, glob patterns specify _sets of filenames_ with wildcard characters.

## Examples

`css/*.css`
Matches everything in the `css` folder with the `css` extensions

`css/**/*.css`
Matches everything in the `css` folder & all subfolders with the `css` extensions

`!css/style.css`
exclude the `style.css` file in the `css` folder

`*.+(js|css)`
Match files in root directory with either `.js` or `.css` extensions

`css/[^_]*.css`
Match all `.css` files in the `css` folder, except those starting with `_`. The `^` at the beginning of a character set means _not_.

## Further reading

- [Glob](https://github.com/isaacs/node-glob)
- [minimatch](https://github.com/isaacs/minimatch)
- [Gulp – How To Build And Develop Websites](https://www.smashingmagazine.com/2014/06/building-with-gulp/)
