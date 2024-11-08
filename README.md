# Hierarchies
Composer package for managing hierarchies within your application

## Views 

To include hierarchies in your view (that has the header/footer and navs), just include the view.

@include('vendor.hierarchies.index')

The view also gets published so you can make changes. 

## Configuration

config/hierarchies.php can be edited to adjust the following settings.

    1. base_path
    
    2. fontawesome_path that is relative to the document root of your application 
    
    3. middleware[s] that apply to this module.

# Models

    1. Position - Model for positions created.

    2. PositionUser - Model recording association of a user with a position.

## Screenshot
![hierarchies](https://github.com/user-attachments/assets/5b34ca59-6a57-4067-8df7-19b8ba8a4b86)
