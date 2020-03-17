# Cheat sheet: AWS CLI

## Setting local environment variables for cli

    export AWS_PROFILE=someProfile
    export AWS_ACCESS_KEY_ID=someID
    export AWS_SECRET_ACCESS_KEY=someKey

## List S3 objects

    aws s3 ls --summarize --human-readable --recursive s3://YOURBUCKET/

## List S3 objects in a specific folder

    aws s3 ls --summarize --human-readable --recursive s3://YOURBUCKET/SOMEFOLDER/

## Copy folder to s3

    aws s3 cp ./SOMEFOLDER/ s3://YOURBUCKET/SOMEFOLDER/ --recursive

## Sync specific folder to s3

    aws s3 sync ./SOMEFOLDER/ s3://YOURBUCKET/SOMEFOLDER/

## Erase the content of a specific folder

    aws s3 rm s3://YOURBUCKET/SOMEFOLDER/ --recursive

## Copy all files from the root of the bucket, but not copy any sub-folders

    aws s3 cp s3://my-bucket s3://my-bucket/destination --recursive --exclude "*/*"
