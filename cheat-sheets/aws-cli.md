# Cheat sheet : AWS CLI

## Setting environment variables

    export AWS_ACCESS_KEY_ID=whateverID
    export AWS_SECRET_ACCESS_KEY=whateverKEY
    export AWS_PROFILE=whateverProfile

## Copying from s3

    aws s3 cp s3://largefs-standardpro/standardpro/wp-content/uploads/ ./ --recursive

## Sync s3 Bucket folder (or entire bucket)

    aws s3 sync s3://largefs-standardpro/standardpro/wp-content/uploads/ ./dd --quiet

## List S3 repo objects

    aws s3api list-objects --bucket largefs-standardnet --output json --query "[sum(Contents[].Size), length(Contents[])]"

    aws s3 ls --summarize --human-readable --recursive s3://largefs-standardnet/
