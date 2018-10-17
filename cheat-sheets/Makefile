# Makefile

target_file: prerequisite_file1 prerequisite_file2
	shell command to build target_file (must be indented with tabs, not spaces)
	another shell command (these commands are called the "recipe")

# Variables
# $< is a shorthand for the list of prerequisites
# $@ is the target file

# Generalized rules
# This tells Make that any file path that begins with lib/ can be built using the given steps, and that the target depends on a matching path under src/.
lib/%: src/%
	mkdir -p $(dir $@)
	babel $< --out-file $@ --source-maps
