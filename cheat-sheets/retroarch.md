# Cheat sheet : RetroArch

If you need a ref, take a look at the [Libretro Docs](http://docs.libretro.com/)

After making changes, for new settings to take effect, quit RetroArch & reload.

## Default settings

_Settings >> Video >> Start in Fullscreen Mode_ should be set to on

_Settings >> input >> Menu Toggle Gamepad Combo_ set to 

## In Game

When in game, press `F1` (or push both ana1log sticks) to pull up the retroarch menu.

To quit a game, access RetroArch and choose `close content`.

Other reasons you'd probably want to access RetroArch:

- Setting and changing shaders
- Saving/loading game states
- Taking screenshots

## Shaders

`crt_aperture` looks good for scan lines and old school content.

You can permanently pair shaders to individual cores or even to individual games!

**Watch out!** If a core or game doesnt have a shader config, the most recent config will be used.

**Watch out!** There's presently a problem with PSP so be sure to only use `shaders_gisl`

## Notes on BIOS

Some cores require the loading of specific BIOS which are not packaged with RetroArch. To see if you need a BIOS after installing a new core, go to _Main Menu >> Information >> Core Information_ and check to see if you're missing files.

Simply download the mising files (you'll need to search online for them) and drop the files RetroArch's `system` folder.

RetroArch's wiki pages probably list BIOS for different cores. As I haven't found a good reference there yet, here's the [OpenEmu user guide : BIOS files](https://github.com/OpenEmu/OpenEmu/wiki/User-guide%3A-BIOS-files) page.

## Good cores

I pulled this list from [here](https://forums.launchbox-app.com/topic/39792-best-retroarch-core-list/), feel free to add to it or replace with whatever.

Take a look at the LaunchBox Cores list for ref

## Rom sources

[Vimm's Lair](https://vimm.net/?p=vault)
[EMU Paradise](https://www.emuparadise.me)
