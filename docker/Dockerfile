FROM php:8.3-fpm-bullseye

ARG WWWGROUP
ARG NODE_VERSION=20
ARG MYSQL_CLIENT="mysql-client"
ARG POSTGRES_VERSION=17

ARG USER_ID
ARG WWWGROUP

RUN if [ ${USER_ID:-0} -ne 0 ] && [ ${WWWGROUP:-0} -ne 0 ]; then \
	userdel -f www-data &&\
	if getent group dialout ; then groupdel dialout; fi &&\
	if getent group www-data ; then groupdel www-data; fi &&\
	groupadd -g ${WWWGROUP} www-data &&\
	useradd -l -u ${USER_ID} -g www-data www-data &&\
	install -d -m 0755 -o www-data -g www-data /application &&\
	mkdir -p /home/www-data/.ssh &&\
	mkdir -p /application &&\
	chown --changes --silent --no-dereference --recursive \
		  ${USER_ID}:${WWWGROUP} \
		/application \
		/run \
		/usr/local/ \
		/home/www-data \
;fi

WORKDIR /var/www

RUN apt-get update -y \
    && mkdir -p /etc/apt/keyrings \
        && apt-get install -y gnupg gosu curl ca-certificates zip unzip git libcap2-bin libpng-dev dnsutils librsvg2-bin nano libonig-dev libzip-dev libpq-dev libssl-dev libedit-dev wget\
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" > /etc/apt/sources.list.d/nodesource.list \
    && apt-get update \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && npm install -g pnpm \
    && npm install -g bun

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /etc/apt/keyrings/yarn.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /etc/apt/keyrings/pgdg.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && apt-get update \
    && apt-get install -y yarn

RUN echo "deb http://apt.postgresql.org/pub/repos/apt/ bullseye-pgdg main" > /etc/apt/sources.list.d/pgdg.list
RUN wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | \
    apt-key add -
RUN apt-get update
RUN apt-get install -y postgresql-client-$POSTGRES_VERSION

RUN apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install  mbstring zip exif pcntl

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN install-php-extensions redis xdebug Imagick/imagick@master pcov igbinary pdo_pgsql gd

USER www-data

EXPOSE 9000
CMD ["php-fpm"]
