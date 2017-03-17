<?php

/* 405.twig */
class __TwigTemplate_beef0b857701c0cdc01f366c63823c8c22a1c0fa588104385cf95ce8f22d889a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>405</title>
</head>
<body>
web 405

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "405.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>405</title>
</head>
<body>
web 405

</body>
</html>", "405.twig", "D:\\www\\slim-bundle\\app\\WebBundle\\Resource\\Views\\templates\\405.twig");
    }
}
