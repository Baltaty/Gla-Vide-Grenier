<?php

namespace Pool;
$configs_env = file_get_contents('../config.json');
$configs_env = json_decode($configs_env,true);
