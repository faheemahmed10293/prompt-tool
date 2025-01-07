<?php
/*
Plugin Name: Prompt Tool
Plugin URI: https://yourtabula.com/
Description: A simple custom plugin to generate prompt using the OpenAI API.
Version: 1.0
Author: Faheem Ahmed
Author URI: https://yourtabula.com/
License: GPL2
*/
require_once plugin_dir_path(__FILE__) . 'config.php';
// Shortcode to display the form
function display_prompt_form() {
    ob_start();
    ?>
	<form id="promptForm" method="post" action="" aria-labelledby="promptFormHeading">
    <!-- <h2 id="promptFormHeading" class="mt-4 text-white">Generate Prompt</h2> -->
    
    <!-- General Business Overview Section -->
    <h3 class="mt-4 text-white">General Business Overview</h3>
    
    <label class="mt-4 text-white" for="business_name">What is the name of your business or organization?
	    <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: Tabula</span>
    </span></label>
    <input class="mt-2" type="text" id="business_name" name="business_name" required>

    <label class="mt-4 text-white" for="business_description">Briefly describe your business. What do you do, and who do you serve?
	<span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “We are an SEO-first agency specializing in Generative Engine Optimization for sustainable business growth.”</span>
    </span></label>
    <input class="mt-2" type="text" id="business_description" name="business_description" required>

    <!-- Mission and Vision Section -->
    <h3 class="mt-4 text-white">Mission and Vision</h3>

    <label class="mt-4 text-white" for="mission">What is your business’s mission or core purpose? (Optional)
	<span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “To empower businesses with cutting-edge AI and SEO strategies for measurable growth.”</span>
    </span></label>
    <input class="mt-2" type="text" id="mission" name="mission">
    
    <label class="mt-4 text-white" for="vision">What is your vision for your business or its long-term goals? (Optional)
	 <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “To become a global leader in AI-driven marketing solutions.”</span>
    </span></label>
    <input class="mt-2" type="text" id="vision" name="vision">

    <!-- Unique Value Proposition Section -->
    <h3 class="mt-4 text-white">Unique Value Proposition</h3>

    <label class="mt-4 text-white" for="unique_value_proposition">What sets your business apart from competitors? (Optional)
	 <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “We focus on blending AI technologies with SEO strategies to deliver faster and more effective marketing solutions.”</span>
    </span></label>
    <input class="mt-2" type="text" id="unique_value_proposition" name="unique_value_proposition">

    <label class="mt-4 text-white" for="pain_points">What pain points does your business solve for your customers? (Optional)
	  <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “We address fragmented data, operational inefficiencies, and tool overload.”</span>
    </span></label>
    <input class="mt-2" type="text" id="pain_points" name="pain_points">

    <!-- Target Audience Section -->
    <h3 class="mt-4 text-white">Target Audience</h3>

    <label class="mt-4 text-white" for="target_audience">Who is your target audience? (Be as specific as possible.)
	 <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “Small to mid-sized businesses, particularly marketing leaders and business owners in tech and retail.”</span>
    </span></label>
    <input class="mt-2" type="text" id="target_audience" name="target_audience" required>

    <label class="mt-4 text-white" for="audience_characteristics">What are the characteristics of your audience? (Optional)
	    <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “Age 30–50, tech-savvy, decision-makers in enterprises.”</span>
    </span></label>
    <input class="mt-2" type="text" id="audience_characteristics" name="audience_characteristics">

    <!-- Tone and Style Section -->
    <h3 class="mt-4 text-white">Tone and Style</h3>

    <label class="mt-4 text-white" for="tone_of_voice">What tone of voice best represents your business? 
	    <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Select the tone that best represents your business.</span>
    </span></label>
    <select class="mt-2" id="tone_of_voice" name="tone_of_voice" required>
        <option value="professional">Professional</option>
        <option value="approachable">Approachable</option>
        <option value="authoritative">Authoritative</option>
        <option value="friendly">Friendly</option>
        <option value="inspirational">Inspirational</option>
        <option value="witty">Witty</option>
    </select>

    <label class="mt-4 text-white" for="communication_style">How would you describe your communication style? (Optional)
	    <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “Clear, simple, and actionable avoiding marketing jargon.”</span>
    </span></label>
    <input class="mt-2" type="text" id="communication_style" name="communication_style">

    <!-- Key Products or Services Section -->
    <h3 class="mt-4 text-white">Key Products or Services</h3>

    <label class="mt-4 text-white" for="key_products">List the key products or services you offer. (Optional)
	   <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “SEO, web development, social media, and tool development.”</span>
    </span></label>
    <input class="mt-2" type="text" id="key_products" name="key_products">

    <label class="mt-4 text-white" for="products_emphasis">Are there any specific aspects of your products/services you’d like to emphasize? (Optional)
	    <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “Scalability, affordability, and ease of tool integration.”</span>
    </span></label>
    <input class="mt-2" type="text" id="products_emphasis" name="products_emphasis">

    <!-- Philosophy and Ethics Section -->
    <h3 class="mt-4 text-white">Philosophy and Ethics</h3>

    <label class="mt-4 text-white" for="business_principles">What principles or values guide your business operations? (Optional)
	    <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “Ethical AI use, transparency, and customer-centricity.”</span>
    </span></label>
    <input class="mt-2" type="text" id="business_principles" name="business_principles">

    <label class="mt-4 text-white" for="ethical_considerations">Are there any ethical or sustainable considerations you prioritize? (Optional)
	    <span class="tooltip-prompt"><i class="fas fa-info-circle"></i>
        <span class="tooltip-prompt-text">Example: “Ensuring responsible AI use and building trust with clients.”</span>
    </span></label>
    <input class="mt-2" type="text" id="ethical_considerations" name="ethical_considerations">

    <!-- Submit Button -->
    <input class="primary-btn3 mt-4" type="submit" value="Generate Prompt" aria-label="Generate Story">
</form>

    <div id="generatedPrompt" aria-live="polite"></div> <!-- Added aria-live -->
	<!-- <button id="copyButton" style="display:none;" aria-label="Copy the generated story">Copy Story</button> -->
    <?php
    return ob_get_clean();
}
add_shortcode('prompt_form', 'display_prompt_form');

function ajax_prompt_story() {
    // Get values from the AJAX request
    $business_name = sanitize_text_field($_POST['business_name']);
    $business_description = sanitize_text_field($_POST['business_description']);
    $mission = sanitize_text_field($_POST['mission']);
    $vision = sanitize_text_field($_POST['vision']);
    $unique_value_proposition = sanitize_text_field($_POST['unique_value_proposition']);
    $pain_points = sanitize_text_field($_POST['pain_points']);
    $business_principles = sanitize_text_field($_POST['business_principles']);
    $ethical_considerations = sanitize_text_field($_POST['ethical_considerations']);
    $target_audience = sanitize_text_field($_POST['target_audience']);
    $audience_characteristics = sanitize_text_field($_POST['audience_characteristics']);
    $products_emphasis = sanitize_text_field($_POST['products_emphasis']);
    $key_products = sanitize_text_field($_POST['key_products']);
    $tone_of_voice = sanitize_text_field($_POST['tone_of_voice']);
    $communication_style = sanitize_text_field($_POST['communication_style']);

    // Prepare the system and user messages for the OpenAI request
    $system_message = [
        'role' => 'system',
        'content' => 'You are a highly knowledgeable assistant trained to deeply understand and represent businesses based on detailed descriptions provided. You use the business\'s mission, philosophy, tone of voice, audience, and unique value propositions to create detailed prompts that can be used to train any LLMs like Chat GPT or others. Your task is to generate a detailed training prompt based on the given information, which includes the business details, values, and communication style.'
    ];

    $user_message = [
        'role' => 'user',
        'content' => "You are a highly experienced expert representing $business_name, a $business_description.\n\nMission & Approach: The business’s mission is to $mission, and its vision is to $vision. It is focused on $unique_value_proposition and addresses key challenges such as $pain_points. This business believes in $business_principles and prioritizes $ethical_considerations.\n\nTarget Audience: $business_name serves $target_audience, characterized by $audience_characteristics.\n\nWhat Sets $business_name Apart: This business stands out because of its $unique_value_proposition, with a focus on $products_emphasis. Key products or services include $key_products, with an emphasis on $products_emphasis.\n\nTone & Communication Style: All responses should maintain a $tone_of_voice, described as $communication_style.\n\nGenerate a detailed prompt to train an LLM based on this information, which includes the business mission, approach, values, audience, and tone of voice. The generated prompt should provide a comprehensive description that could be used to train any LLM for understanding and representing this business."
    ];

    // Prepare the request data for OpenAI API
    $data = [
        'model' => 'gpt-3.5-turbo',
        'messages' => [$system_message, $user_message],
    ];

    // Set up cURL for the API request
    $api_key =  OPENAI_API_KEY;
    $url = 'https://api.openai.com/v1/chat/completions';

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => [
                "Content-Type: application/json",
                "Authorization: Bearer $api_key"
            ],
            'content' => json_encode($data)
        ]
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    // Decode the response and return the answer
    if ($response) {
        $response_data = json_decode($response, true);
        $generated_text = $response_data['choices'][0]['message']['content'];

        // 1. Remove bold formatting (ignoring '**' symbols)
        $generated_text = preg_replace('/\*\*(.*?)\*\*/', '$1', $generated_text);

        // 2. Wrap only the first heading containing ':' in <h1> tag and remove ':' from it
        $generated_text = preg_replace_callback('/([^\n:]+):/', function($matches) {
            // First occurrence of a heading should be wrapped in <h1> tag without ':'
            static $is_first_heading = true;
            if ($is_first_heading) {
                $is_first_heading = false;
                return '<h1>' . htmlspecialchars($matches[1]) . '</h1>';
            }
            // Subsequent headings with ':' wrapped in <h3> tag
            return '<h4>' . htmlspecialchars($matches[1]) . ':</h4>';
        }, $generated_text);

        // 3. Wrap content that follows each heading in <p> tags, excluding the heading itself
        $generated_text = preg_replace('/(?<=<\/h4>)\s*([^\n]+)/', '<p>$1</p>', $generated_text);
        $generated_text = preg_replace('/(?<=<\/h1>)\s*([^\n]+)/', '<p>$1</p>', $generated_text); // Handle <h1> followed by text

        // Remove any additional line breaks that might have been added
        $generated_text = preg_replace('/\n+/', '', $generated_text);

        echo $generated_text;
    } else {
        echo '<p>Sorry, there was an error processing your request. Please try again.</p>';
    }

    wp_die(); // End the AJAX request
}

// Hook for AJAX requests
add_action('wp_ajax_prompt_story', 'ajax_prompt_story');
add_action('wp_ajax_nopriv_prompt_story', 'ajax_prompt_story');

function my_custom_plugin_files() {
    // Register and enqueue custom.js
    wp_enqueue_script(
        'my-custom-script-file', 
        plugins_url('inc/custom-prompt.js', __FILE__), 
        array('jquery'), 
        null, 
        true
    );
    // Pass admin-ajax.php URL to the script
    wp_localize_script('my-custom-script-file', 'myAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    // Enqueue custom.css
    wp_enqueue_style(
        'my-custom-style-file', 
        plugins_url('inc/custom-prompt.css', __FILE__)
    );
}
add_action('wp_enqueue_scripts', 'my_custom_plugin_files');