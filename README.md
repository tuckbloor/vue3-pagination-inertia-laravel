Simple Pagination For Laravel when using Inertia js with vue3

you will need to add the following to your routes

    Route::match(['GET','POST'],'/test', 'TestController@test')->name('test');

Test Controller will need editing


The test uses a table called test in the TestController.php

    $data = \DB::table('test')->paginate(5); edit this for your table
    
    
To Add this component to your project see Test.vue and edit the properties in the for loop
    
    <tr v-for="map in pageData.data">
  
        <td>
            {{map.name}}
        </td>
    
    </tr>
    
axios should be pulled in globally and bootstrap 4 for css pagination