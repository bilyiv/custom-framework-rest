#!/bin/bash

set -e

php bin/migrate.php

exec "$@"