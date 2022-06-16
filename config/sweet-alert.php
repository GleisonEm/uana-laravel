<?php

return [
    /*
     * This sets the global autoclose for all alerts.
     * If you want to change a specific  alert chain ->autoclose(milliseconds) on the end.
     */
    'autoclose' => 1800,
];


/*
    Alert::info('Welcome', 'Demo info alert');
    Alert::success('Welcome', 'Demo success alert');
    Alert::error('Welcome', 'Demo error alert');
    Alert::warning('Welcome', 'Demo warning alert');
    Alert::success('Welcome', 'Demo success alert')->autoclose(3500);
    Alert::success('Welcome', 'Demo success alert')->persistent("Ok");
    Alert::message('Robots are working!');

*/
