<?php

class Setup extends WireData implements Module {

    public static function getModuleInfo() {
        return array(
            'title' => 'Portfolio Setup',
            'version' => 1,
            'summary' => 'Sets up the portfolio website.',
            'singular' => true,
            'autoload' => true,
        );
    }

    public function init() {
        // add a hook to the admin to run the setup
        $this->addHookAfter('ProcessPageList::execute', $this, 'runSetup');
    }

    public function runSetup() {
        // check if the setup has already been run
        if ($this->modules->isInstalled('Setup')) {
            return;
        }

        // create a new page to run the setup
        $p = new Page();
        $p->template = 'admin';
        $p->parent = $this->pages->get($this->config->adminRootPageID);
        $p->name = 'setup';
        $p->title = 'Portfolio Setup';
        $p->save();

        // add a message to the page
        $this->message('Click here to run the setup script: <a href="' . $p->url . '">Setup</a>');

        // add a hook to the setup page to run the setup script
        $this->addHookAfter('ProcessPageEdit::buildForm', $this, 'runSetupScript');
    }

    public function runSetupScript($event) {
        $page = $event->object->getPage();
        if ($page->name !== 'setup') {
            return;
        }

        // run the setup script
        $this->createTemplates();
        $this->createFields();
        $this->createPages();

        // uninstall the module
        $this->modules->uninstall('Setup');

        // redirect to the home page
        $this->session->redirect($this->pages->get('/')->url);
    }

    public function createTemplates() {
        // create a new template group
        $templateGroup = new Template();
        $templateGroup->name = 'portfolio-templates';
        $templateGroup->save();

        // create a basic-page template
        $basicPage = new Template();
        $basicPage->name = 'basic-page';
        $basicPage->fieldgroup = $this->fieldgroups->get('default');
        $basicPage->save();

        // add the template to the group
        $templateGroup->add($basicPage);
        $templateGroup->save();

        // create the other templates
        $templates = array('home', 'projects', 'project', 'skills', 'about');
        foreach ($templates as $template) {
            $t = new Template();
            $t->name = $template;
            $t->fieldgroup = $this->fieldgroups->get('default');
            $t->save();

            // add the template to the group
            $templateGroup->add($t);
            $templateGroup->save();
        }
    }

    public function createFields() {
        // create a new field group
        $fieldGroup = new Fieldgroup();
        $fieldGroup->name = 'portfolio-fields';
        $fieldGroup->save();

        // create the fields
        $fields = array(
            'technologies' => 'FieldtypeText',
            'role' => 'FieldtypeText',
            'images' => 'FieldtypeImage',
            'code_snippets' => 'FieldtypeTextarea',
            'skills' => 'FieldtypeRepeater',
        );

        foreach ($fields as $name => $type) {
            $f = new Field();
            $f->name = $name;
            $f->type = $this->modules->get($type);
            $f->save();

            // add the field to the group
            $fieldGroup->add($f);
            $fieldGroup->save();
        }

        // add the fields to the templates
        $projectTemplate = $this->templates->get('project');
        $projectTemplate->fieldgroup->add($this->fields->get('technologies'));
        $projectTemplate->fieldgroup->add($this->fields->get('role'));
        $projectTemplate->fieldgroup->add($this->fields->get('images'));
        $projectTemplate->fieldgroup->add($this->fields->get('code_snippets'));
        $projectTemplate->save();

        $skillsTemplate = $this->templates->get('skills');
        $skillsTemplate->fieldgroup->add($this->fields->get('skills'));
        $skillsTemplate->save();
    }

    public function createPages() {
        // create the home page
        $home = $this->pages->get(1);
        $home->template = 'home';
        $home->title = 'Home';
        $home->save();

        // create the other pages
        $pages = array(
            'projects' => 'Projects',
            'skills' => 'Skills',
            'about' => 'About',
        );

        foreach ($pages as $name => $title) {
            $p = new Page();
            $p->template = $name;
            $p->parent = $home;
            $p->name = $name;
            $p->title = $title;
            $p->save();
        }
    }
}
