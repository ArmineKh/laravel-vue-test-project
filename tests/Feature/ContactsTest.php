<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Contact;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    public function a_contact_can_be_added()
    {
        $this->withoutExceptionHandling();
        $this->post('/api/contacts', [
            'name' =>'Test name',
            'email' => 'test@email.com',
            'birthday' => '05/14/1988',
            'company' =>'ABC String',
            ]);
        $contact = Contact::first();
        $this->assertEquals('Test name',$contact->name);
        $this->assertEquals('test@email.com',$contact->email);
        $this->assertEquals('05/14/1988',$contact->birthday);
        $this->assertEquals('ABC String',$contact->company);

    }
}
