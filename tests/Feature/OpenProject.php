<?php

it('has open page', function () {
    $response = $this->get('/OpenProject');
    $response->assertStatus(200);
});
// ->group('OpenViews');

// it('has welcome2 page')
//     ->get('/')
//     ->assertStatus(200)->group('OpenViews');