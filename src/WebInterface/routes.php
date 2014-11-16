<?php
/**
 * Web UI resource routes
 */

$app->get('/videos', 'video.controller:listVideosAction');