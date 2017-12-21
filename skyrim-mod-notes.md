# Skyrim :: Mod notes

- Setup Player Exclusive animations
- Play Random Idle: Put your favourite idle animations (e.g. Pretty Female Idles) into "Meshes/Actors/Character/Animations/PlayRandomIdle" and name them "PRI001.hkx" to "PRI020.hkx". Run GenerateFNISforUsers.exe. Done.
- The XP32 skeleton has options for animations for wild weapon placement (i knida want belt fastened quivers...)
- Dual Sheath Redux needs to be messed with if I wanna switch to swords on back (prolly all the animations too)
- If black and purple or rainbow colors on their money bag and alchemy lab tables - set `iTexMipMapSkip` to the value of 0 in the `SkyrimPrefs.ini` under [Display]
- [Uncapper guide](http://wiki.step-project.com/Guide:Skyrim_-Community-_Uncapper)
- Review other plugins options in MCM

## MCM Adjustments

    // Lanterns of Skyrim

    Check every: 60 secs
    Enable lanterns along roads: unticked

    // Lightning Config - Fork Lightning Options
    Hostile: TICKED
    Frequency Delay: 25 Seconds

    // Auto Ammo Unequip
    Follower Addon: ticked

    // Dual Wield Parry
    The default key (V) for blocking when dual wielding weapons
    Change this if you like
    Make sure the Mod Active setting is ticked or the mod will not work

    // Lock Overhaul
    If the mod is not active, activate it
    In activating it, you'll have to exit the menus back to the game before you're able to see the available options
    STEP recommends changing following settings:

    Smash Locks
    Activate Smash Locks: ticked
    Allowed Weapons: Two+ One Handed

    Unlock with Magic
    Enable Unlock Spell: ticked

    // SOS for females - All females schlonged but PC
    MCM SOS - Player / NPC Settings: Pick the "No schlong" option.

    // Not all females schlonged, just the PC or the ones I want
    MCM SOS - "NPC schlong type probability" in the MCM menus, SOS UNP tab. This will set the probability to zero to all races. The value for the global setting doesn't change, it's normal.
    MCM SOS - Player / NPC Settings: set a the UNP schlong to the PC or NPC

    // Random females schlonged based on a chance (requires CK editing)
    Load in CK a non-female schlong addon you are using (e.g. VectorPlexus Muscular)
    Look for the gender global variable (e.g. "SOS_Addon_VectorPlexusMuscular_Gender") Change it to 2 (2 = male and female). Click OK, save and exit.
    The muscular schlong has no female meshes in the armor addon so it will be invisible when a female equips it
    MCM SOS - "NPC schlong type probability" SOS, UNP tab. This will propagate the probability to all races. The value for the global setting doesn't change, it's normal. For a 10% surprise chance, set the muscular schlong to 90%, and the UNP to 10%

## If you want this - change this

SkyRE - Skyrim Skill Interface Re-Texture (SSIRT)
Joy of Perspective - XP32 Max Skeleton (re run installer)
Interesting NPCs - Clothing and Clutter Fixes (get patch)
Falskaar - SkyFalls + SkyMills (re run installer)
Wyrmstooth - SkyFalls + SkyMills (re run installer)
Falskaar - Farmhouse Chimneys (re run installer)
Wyrmstooth - Farmhouse Chimneys (re run installer)
Aurora - Farmhouse Chimneys (re run installer)
Helarchen Creek - Farmhouse Chimneys (re run installer)
Moon and Star - Farmhouse Chimneys (re run installer)
Arthmoors Village Exapansions - Farmhouse Chimneys (re run installer)
Ningheim Race - Brows (has patch)
Enhanced Lighting for ENB - Immersive Citizens (re run installer)
Enhanced Lights and Effects - Immersive Citizens (re run installer)
Open Cities - Immersive Citizens (re run installer)
Moonpath too Elswyre - Immersive Citizens (re run installer)
Realistic Room Rental ADVANCED - Immersive Citizens (re run installer)
Immersive Creatures - Enhanced Blood Textures (re run installer)
Better Docks - Realistic Boat Bobbing (re run installer)
Better Fast Travel - Realistic Boat Bobbing (re run installer)
Falskaar - Realistic Boat Bobbing (re run installer)
No Snow Under the Roof - Realistic Boat Bobbing (re run installer)
Wyrmstooth - Realistic Boat Bobbing (re run installer)
Open Cities - Enhanced Skyrim Factions - The Companions Guild (has patch)

** - Relationship Dialogue Overhaul has several patches
