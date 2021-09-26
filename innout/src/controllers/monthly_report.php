<?php
session_start();
requireValidSession();

loadTemplateView('monthly_report');
