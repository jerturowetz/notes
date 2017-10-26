# Cheat sheet : Vagrant

## Teardown
vagrant suspend                        # Pauses machine. *Still eats up ram & disc space*
vagrant halt                           # Performs a shutdown. *Still eats up disk space*
vagrant destroy                        # Completely removes machine. *Drives cleared, needs to be rebuilt*

## Re-provision
vagrant provision                      # Re-run the provisioner without stopping the VM. Fast.
vagrant reload                         # Restart the VM & re-provisions if settings changed
vagrant reload --provision             # Same as above but guarantees provisioning
vagrant destroy --force && vagrant up  # Fully deletes the vm and rebuilds. Slow but guarantees stability

## Other general commands
vagrant box update                     # Make sure we use the latest version of a box
vagrant plugin update                  # Update plugins
vagrant global-status --prune          # Accidentally deleted the vm folder? try this.

