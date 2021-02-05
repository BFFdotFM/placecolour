# placecolour

A tiny little PHP app to serve up deterministic colour images.

At BFF.fm, like many websites, our user generated content assets are uploaded to and S3-like store. In our
development environment, we us Minio as a local S3 clone when running locally. What we don't want to do is
bog down out repository with binary assets every time someone creates new base data or builds out a feature,
while not wanting to spin up the site with myriad broken images either.

Hence placecolour: A cheerful little script that, given a path, returns a coloured image in the requested size.

We use this as the proxy fallback for Minio in local development, so in any situation where local data assets
are nolonger available, they're replaced by colours, keeping a locally running test site functional.
