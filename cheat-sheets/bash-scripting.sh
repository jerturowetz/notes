#!/bin/bash
#
# The shell style ghuide by google is great
# https://google.github.io/styleguide/shell.xml#File_Header

# Loops trough folders and then you can do whatever
for D in *; do
    if [ -d "${D}" ]; then
        echo "${D}"
    fi
done

# Or, if your action is a single command, this is more concise
for D in *; do [ -d "${D}" ] && my_command; done

# Or an even more concise version (thanks @enzotib). Note that in this version each value of D will have a trailing slash
for D in */; do my_command; done

# example function
prepend_to_file () {

	local file_name = "${1}"
	local prepend_string = "${2}"

	if [ ! -f "${file_name}" ]; then
		return $E_BADFILE;
    fi

	mv "${file_name}" "${prepend_string}--${file_name}"
	return 0;

}
