<?php

/* Index/index.twig */
class __TwigTemplate_48dbf485ddfd5c6e05f0e45ce6e1d0ac5ba2dcdb55657298f41656054e7e2a30 extends Twig_Template
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
    <title>test</title>
</head>

<body style=\"width:100%\">
网站端

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "Index/index.twig";
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
    <title>test</title>
</head>

<body style=\"width:100%\">
网站端

</body>
</html>", "Index/index.twig", "D:\\www\\slim\\app\\WebBundle\\Resource\\Views\\templates\\Index\\index.twig");
    }
}
