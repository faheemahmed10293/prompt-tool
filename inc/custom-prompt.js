jQuery(document).ready(function($) {
    $('#promptForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        // Show the default message and start animation
        $('#generatedPrompt').html('<p style="color:#fffefe;margin-top:10px;">Hold tight! Your prompt is brewing<span class="dots"></span></p>');
        $('#generatedPrompt').show(); // Show the generatedStory div

        var formData = {
            action: 'prompt_story',
            business_name: $('#business_name').val(),
            business_description: $('#business_description').val(),
            mission: $('#mission').val(),
            vision: $('#vision').val(),
            unique_value_proposition: $('#unique_value_proposition').val(),
            pain_points: $('#pain_points').val(),
            business_principles: $('#business_principles').val(),
            ethical_considerations: $('#ethical_considerations').val(),
            target_audience: $('#target_audience').val(),
            audience_characteristics: $('#audience_characteristics').val(),
            products_emphasis: $('#products_emphasis').val(),
            key_products: $('#key_products').val(),
            tone_of_voice: $('#tone_of_voice').val(),
            communication_style: $('#communication_style').val()
        };
        
        $.post(myAjax.ajaxurl, formData, function(response) {
            $('#generatedPrompt').html(response); // Display the story in the div
        });
    });
});
