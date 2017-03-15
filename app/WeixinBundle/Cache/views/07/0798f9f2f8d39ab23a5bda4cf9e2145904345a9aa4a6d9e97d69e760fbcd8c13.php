<?php

/* Index/index.twig */
class __TwigTemplate_a8efcd3f78a8f3c6b91a321ddb1985538adae4cac21dc02b4c16d7fca61eafd6 extends Twig_Template
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
微信端

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
微信端

</body>
</html>", "Index/index.twig", "D:\\www\\slim\\app\\WeixinBundle\\Resource\\Views\\templates\\Index\\index.twig");
    }
}
