# Cheat sheet : Git

## Useful commands & things I often forget

    git merge --abort

    git push --tags

    git log -u # see all the commits related to a file
    git ll -1 # Show modified files in last commit

    git ls-remote # get a list of remote references
    git remote show # get a list of remote references

## Removing files

    git rm filename # deletes file and stages removal

If uncomitted changes have been made to the file to be removed, removal must be forced (alternatively you could checkout the file first)

    git rm -f PROJECTS.md

To keep the file in your working tree but remove it from your staging area (--staged and --cached are synonyms and either can be interchanged)

    git rm --cached README
    git rm -r --cached <directory> ## remove a tracked directory

Other fun examples (note: the backslash (\) in front of the *. is necessary because Git does its own filename expansion in addition to your shell’s filename expansion)

    git rm log/\*.log # Removes all files that have the .log extension in the log/ directory
    git rm \*~ # removes all files that end with ~.

## Fixing stuff

Amend the last commit (never amend a commit that has already been pushed to a remote repository)

    git add some/changed/files # optional
    git commit --amend -m "The message, this time without typos"

### Fix stuff not yet committed

    git checkout -- file/to/restore

### Reset & unstage files

    git reset # doesn't change anything in the working directory
    git reset --hard # wipes away local changes
    git reset --hard 2be18d9 # wipes away local changes and brings us back in time to whatever commit

If you have some merge conflicts, or accidentally started to make a change to your local directory before pulling the changes from the master, here's how you can revert your local directory to what's on GitHub.

    git fetch --all
    git reset --hard origin/master

### Revert a single commit

This doesn’t remove any commits, in fact it creates a new commit which introduces changes that are just the opposite of the commit to be reverted.

    git revert 2be18d9

## Branch Managment

    git branch - d # delete a branch
    git branch --merged # see merged
    git branch --no-merged # see unmerged

Checkout a remote branch locally (create a local branch and add a pointer to the remote location)

    git checkout -b serverfix remote/remotebranchname # full syntax
    git checkout --track remote/remotebranchname # shorthand
    git checkout remotebranchname # extra shorthand - can have naming issues

Set up a local branch with a different name than the remote branch

    git checkout -b sf remote/remotebranchname

If you already have a local branch and want to set it to a remote branch you just pulled down, or want to change the upstream branch you’re tracking, you can use the -u or --set-upstream-to option to git branch to explicitly set it at any time

    git branch -u remote/remotebranchname

see what tracking branches you have set up

    git branch -vv

Fetch before checking branch relationships

    git fetch --all
    git branch -vv

Deleting Remote Branches

    git push origin --delete serverfix

### Example conflicting remote pull request with conflicts

Make a new branch with their changes

    git checkout -b <their-branch> master
    git pull <their.git> master

Play with the files and commit them

    git add <files>
    git commit -m 'Message'
    git push origin master

Merge back into your branch & push

    git checkout master
    git merge --no-ff <their-branch> -m 'Message'
    git push origin master

## Git Diff

    git diff --name-only --diff-filter=U  ## Identify conflicts
    git diff --cached HEAD^ # Show a diff last commit

Git diff doesn’t show all changes made since your last commit, only unstaged changes. This can be confusing, because if you’ve staged all of your changes, git diff will give you no output.

This can also be super useful if you staged a file then edited it some more, git diff would then return only the unstaged changes.

To instead see staged changes compared to the last commit

    git diff --staged # --staged and --cached are synonyms and either can be interchanged

Run `git difftool --tool-help` to see what tools are available on your system

## Tagging

Git uses two main types of tags: lightweight and annotated. A lightweight tag is very much like a branch that doesn’t change – it's just a pointer to a specific commit. Annotated tags, however, are stored as full objects in the Git database. They’re checksummed; contain the tagger name, email, and date; have a tagging message; and can be signed and verified with GNU Privacy Guard (GPG).

It’s generally recommended that you create annotated tags so you can have all this information; but if you want a temporary tag or for some reason don’t want to keep the other information, lightweight tags are available too.

    git tag # List tags in alphabetical order
    git tag -l "v1.8.5*" #List tags that match certain criteria
    git tag -a v1.4 -m "my version 1.4" # create an annotated tag
    git show v1.4 # View tag data

By default, the git push command doesn’t transfer tags to remote servers. You will have to explicitly push tags to a shared server after you have created them. This process is just like sharing remote branches: you can run git push origin [tagname].

    git push origin v1.5 # push a specific tag
    git push origin --tags # always forgetting this
