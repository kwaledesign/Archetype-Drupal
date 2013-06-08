Occam
=====

A Drupal 7 base theme that makes as few assumptions as possible. 

##Archetype Drupal Sub-Theme Installation:
1. Download and install Archetype
2. Download Drupal
3. Download and install the [Occam](https://github.com/kwaledesign/Occam) base
   theme.
4. Within your new Drupal site's root, navigate to
   sites/all/themes/Occam/STARTERKIT (which you'll rename to your sub-theme's
   name)
5. Run compass create specifying your sub-theme's sass, css, js, images, and
   font directories (run compass create --help for furhter instructions).
```
compass create my_sub_theme_name -r Archetype --using Archetype/Drupal
```
6. Lastly, you'll need to create your template.php, THEMENAME.info, and your
   theme-settings.php files along with your templates directory.  Most base
   themes have a STARTERKIT (or similarly named) directory with these files
   ready to go. For example, if you're using
   [Occam](https://github.com/kwaledesign/Occam):
```
cd path_to_Drupal_install/sites/all/themes/Occam/STARTERKIT
cp template.php STARTERKIT.info.txt theme-settings.php ../your_sub_theme_name
cp -r templates/ ../your_sub_theme_name
```

