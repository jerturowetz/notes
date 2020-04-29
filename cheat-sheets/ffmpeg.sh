# Instantly trim videos without re-encoding

INFILE="video.mp4"
OUTFILE="shortenedclip.mp4"

START="00:00:12.35"     # Start Time in hh:mm:ss.msec format
DURATION="00:01:05.4"   # Duration in hh:mm:ss.msec format

################## Alternative format ##################
# START="12.35"      # Start time in s.msec format     #
# DURATION="65.4"    # Duration time in s.msec format  #
########################################################

ffmpeg -ss $START -i $INFILE -c copy -map 0 -t $DURATION $OUTFILE

# If you prefer you can also specify an end time similar to the start time

END="00:01:12.75"
ffmpeg -ss $START -i $INFILE -c copy -map 0 -to $END $OUTFILE
