FROM mozilla/mozphab:86ac8ba2a6b10f33609a2cab6997512c93afb076

COPY extensions /app/moz-extensions

# Move static resources to phabricator, add files to celerity map array
COPY extensions/src/motd/css/MozillaMOTD.css /app/phabricator/webroot/rsrc/css/MozillaMOTD.css
COPY extensions/src/auth/PhabricatorBMOAuth.css /app/phabricator/webroot/rsrc/css/PhabricatorBMOAuth.css
COPY extensions/src/auth/PhabricatorBMOAuth.js /app/phabricator/webroot/rsrc/js/PhabricatorBMOAuth.js

USER root

# Install dependencies
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_VENDOR_DIR /app/phabricator/externals/extensions
RUN \
    curl -sS https://getcomposer.org/installer | php && \
    php composer.phar require sentry/sentry php-http/curl-client guzzlehttp/psr7

# Apply customization patches
# Phabricator
COPY patches /app/patches
RUN \
    cd /app/phabricator && \
    for i in /app/patches/phabricator/*.patch; do patch -p1 < $i; done

# Configure Phabricator to use moz-extensions library
RUN \
    mkdir /app/phabricator/conf/custom/ && \
    echo custom/moz-extensions > /app/phabricator/conf/local/ENVIRONMENT
COPY moz-extensions.conf.php /app/phabricator/conf/custom/

# Update build_url in version.json
COPY phabext.json /app
COPY update_build_url.py /app
RUN chmod +x /app/update_build_url.py && /app/update_build_url.py

RUN chown -R app:app /app
RUN chmod +x /app/moz-extensions/bin/*

USER app
VOLUME ["/app"]
