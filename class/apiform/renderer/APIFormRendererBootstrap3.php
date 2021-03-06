<?php
/**
 * Email Account Propogation REST Services API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://syd.au.snails.email
 * @license         ACADEMIC APL 2 (https://sourceforge.net/u/chronolabscoop/wiki/Academic%20Public%20License%2C%20version%202.0/)
 * @license         GNU GPL 3 (http://www.gnu.org/licenses/gpl.html)
 * @package         emails-api
 * @since           1.1.11
 * @author          Dr. Simon Antony Roberts <simon@snails.email>
 * @version         1.1.11
 * @description		A REST API for the creation and management of emails/forwarders and domain name parks for email
 * @link            http://internetfounder.wordpress.com
 * @link            https://github.com/Chronolabs-Cooperative/Emails-API-PHP
 * @link            https://sourceforge.net/p/chronolabs-cooperative
 * @link            https://facebook.com/ChronolabsCoop
 * @link            https://twitter.com/ChronolabsCoop
 * 
 */


class APIFormRendererBootstrap3 implements APIFormRendererInterface
{

    /**
     * Render support for APIFormButton
     *
     * @param APIFormButton $element form element
     *
     * @return string rendered form element
     */
    public function renderFormButton(APIFormButton $element)
    {
        return "<input type='" . $element->getType() . "' class='btn btn-default' name='"
            . $element->getName() . "'  id='" . $element->getName() . "' value='" . $element->getValue()
            . "' title='" . $element->getValue() . "'" . $element->getExtra() . ' />';
    }

    /**
     * Render support for APIFormButtonTray
     *
     * @param APIFormButtonTray $element form element
     *
     * @return string rendered form element
     */
    public function renderFormButtonTray(APIFormButtonTray $element)
    {
        $ret = '';
        if ($element->_showDelete) {
            $ret .= '<input type="submit" class="btn btn-danger" name="delete" id="delete" value="' . _DELETE
                . '" onclick="this.form.elements.op.value=\'delete\'">&nbsp;';
        }
        $ret .= '<input type="button" class="btn btn-danger" value="' . _CANCEL
             . '" onClick="history.go(-1);return true;" />&nbsp;'
             . '<input type="reset" class="btn btn-warning"  name="reset"  id="reset" value="' . _RESET . '" />&nbsp;'
             . '<input type="' . $element->getType() . '" class="btn btn-success"  name="' . $element->getName()
             . '"  id="' . $element->getName() . '" value="' . $element->getValue() . '"' . $element->getExtra()
             . '  />';

        return $ret;
    }

    /**
     * Render support for APIFormCheckBox
     *
     * @param APIFormCheckBox $element form element
     *
     * @return string rendered form element
     */
    public function renderFormCheckBox(APIFormCheckBox $element)
    {
        $elementName = $element->getName();
        $elementId = $elementName;
        $elementOptions = $element->getOptions();
        if (count($elementOptions) > 1 && substr($elementName, -2, 2) !== '[]') {
            $elementName .= '[]';
            $element->setName($elementName);
        }

        switch ((int) ($element->columns)) {
            case 0:
                return $this->renderCheckedInline($element, 'checkbox', $elementId, $elementName);
            case 1:
                return $this->renderCheckedOneColumn($element, 'checkbox', $elementId, $elementName);
            default:
                return $this->renderCheckedColumnar($element, 'checkbox', $elementId, $elementName);
        }
    }

    /**
     * Render a inline checkbox or radio element
     *
     * @param APIFormCheckBox|APIFormRadio $element element being rendered
     * @param string                           $type    'checkbox' or 'radio;
     * @param string                           $elementId   input 'id' attribute of element
     * @param string                           $elementName input 'name' attribute of element
     * @return string
     */
    protected function renderCheckedInline($element, $type, $elementId, $elementName)
    {
        $class = $type . '-inline';
        $ret = '';

        $idSuffix = 0;
        $elementValue = $element->getValue();
        $elementOptions = $element->getOptions();
        foreach ($elementOptions as $value => $name) {
            ++$idSuffix;
            $ret .= '<label class="' . $class . '">';
            $ret .= "<input type='" . $type . "' name='{$elementName}' id='{$elementId}{$idSuffix}' title='"
                . htmlspecialchars(strip_tags($name), ENT_QUOTES) . "' value='"
                . htmlspecialchars($value, ENT_QUOTES) . "'";

            if (is_array($elementValue) ? in_array($value, $elementValue): $value == $elementValue) {
                $ret .= ' checked';
            }
            $ret .= $element->getExtra() . ' />' . $name . $element->getDelimeter();
            $ret .= '</label>';
        }

        return $ret;
    }

    /**
     * Render a single column checkbox or radio element
     *
     * @param APIFormCheckBox|APIFormRadio $element element being rendered
     * @param string                           $type    'checkbox' or 'radio;
     * @param string                           $elementId   input 'id' attribute of element
     * @param string                           $elementName input 'name' attribute of element
     * @return string
     */
    protected function renderCheckedOneColumn($element, $type, $elementId, $elementName)
    {
        $class = $type;
        $ret = '';

        $idSuffix = 0;
        $elementValue = $element->getValue();
        $elementOptions = $element->getOptions();
        foreach ($elementOptions as $value => $name) {
            ++$idSuffix;
            $ret .= '<div class="' . $class . '">';
            $ret .= '<label>';
            $ret .= "<input type='" . $type . "' name='{$elementName}' id='{$elementId}{$idSuffix}' title='"
                . htmlspecialchars(strip_tags($name), ENT_QUOTES) . "' value='"
                . htmlspecialchars($value, ENT_QUOTES) . "'";

            if (is_array($elementValue) ? in_array($value, $elementValue): $value == $elementValue) {
                $ret .= ' checked';
            }
            $ret .= $element->getExtra() . ' />' . $name . $element->getDelimeter();
            $ret .= '</label>';
            $ret .= '</div>';
        }

        return $ret;
    }

    /**
     * Render a multicolumn checkbox or radio element
     *
     * @param APIFormCheckBox|APIFormRadio $element element being rendered
     * @param string                           $type    'checkbox' or 'radio;
     * @param string                           $elementId   input 'id' attribute of element
     * @param string                           $elementName input 'name' attribute of element
     * @return string
     */
    protected function renderCheckedColumnar($element, $type, $elementId, $elementName)
    {
        $class = $type;
        $ret = '';

        $idSuffix = 0;
        $elementValue = $element->getValue();
        $elementOptions = $element->getOptions();
        foreach ($elementOptions as $value => $name) {
            ++$idSuffix;
            $ret .= '<div class="' . $class . ' col-md-2">';
            $ret .= '<label>';
            $ret .= "<input type='" . $type . "' name='{$elementName}' id='{$elementId}{$idSuffix}' title='"
                . htmlspecialchars(strip_tags($name), ENT_QUOTES) . "' value='"
                . htmlspecialchars($value, ENT_QUOTES) . "'";

            if (is_array($elementValue) ? in_array($value, $elementValue): $value == $elementValue) {
                $ret .= ' checked';
            }
            $ret .= $element->getExtra() . ' />' . $name . $element->getDelimeter();
            $ret .= '</label>';
            $ret .= '</div>';
        }

        return $ret;
    }
    /**
     * Render support for APIFormColorPicker
     *
     * @param APIFormColorPicker $element form element
     *
     * @return string rendered form element
     */
    public function renderFormColorPicker(APIFormColorPicker $element)
    {
        if (isset($GLOBALS['xoTheme'])) {
            $GLOBALS['xoTheme']->addScript('include/spectrum.js');
            $GLOBALS['xoTheme']->addStylesheet('include/spectrum.css');
        } else {
            echo '<script type="text/javascript" src="' . API_URL . '/include/spectrum.js"></script>';
            echo '<link rel="stylesheet" type="text/css" href="' . API_URL . '/include/spectrum.css">';
        }
        return '<input class="form-control" style="width: 25%;" type="color" name="' . $element->getName()
            . "' title='" . $element->getTitle() . "' id='" . $element->getName()
            . '" size="7" maxlength="7" value="' . $element->getValue() . '"' . $element->getExtra() . ' />';
    }

    /**
     * Render support for APIFormDhtmlTextArea
     *
     * @param APIFormDhtmlTextArea $element form element
     *
     * @return string rendered form element
     */
    public function renderFormDhtmlTextArea(APIFormDhtmlTextArea $element)
    {
        static $js_loaded;

        api_loadLanguage('formdhtmltextarea');
        $ret = '';
        // actions
        $ret .= $this->renderFormDhtmlTAAPICode($element) . "<br>\n";
        // fonts
        $ret .= $this->renderFormDhtmlTATypography($element);
        // length checker

        $ret .= "<br>\n";
        // the textarea box
        $ret .= "<textarea class='form-control' id='" . $element->getName() . "' name='" . $element->getName()
            . "' title='" . $element->getTitle() . "' onselect=\"apiSavePosition('" . $element->getName()
            . "');\" onclick=\"apiSavePosition('" . $element->getName()
            . "');\" onkeyup=\"apiSavePosition('" . $element->getName() . "');\" cols='"
            . $element->getCols() . "' rows='" . $element->getRows() . "'" . $element->getExtra()
            . '>' . $element->getValue() . "</textarea>\n";

        if (empty($element->skipPreview)) {
            if (empty($GLOBALS['xoTheme'])) {
                $element->js .= implode('', file(API_ROOT_PATH . '/class/textsanitizer/image/image.js'));
            } else {
                $GLOBALS['xoTheme']->addScript(
                    '/class/textsanitizer/image/image.js',
                    array('type' => 'text/javascript')
                );
            }
            $button = "<button type='button' class='btn btn-primary' onclick=\"form_instantPreview('" . API_URL
                . "', '" . $element->getName() . "','" . API_URL . "/images', " . (int)$element->doHtml . ", '"
                . $GLOBALS['apiSecurity']->createToken() . "')\" title='" . _PREVIEW . "'>" . _PREVIEW . "</button>";

            $ret .= '<br>' . "<div id='" . $element->getName() . "_hidden' style='display: block;'> "
                . '   <fieldset>' . '       <legend>' . $button . '</legend>'
                . "       <div id='" . $element->getName() . "_hidden_data'>" . _API_FORM_PREVIEW_CONTENT
                . '</div>' . '   </fieldset>' . '</div>';
        }
        // Load javascript
        if (empty($js_loaded)) {
            $javascript = ($element->js ? '<script type="text/javascript">' . $element->js . '</script>' : '')
                . '<script type="text/javascript" src="' . API_URL . '/include/formdhtmltextarea.js"></script>';
            $ret        = $javascript . $ret;
            $js_loaded  = true;
        }

        return $ret;
    }

    /**
     * Render apicode buttons for editor, include calling text sanitizer extensions
     *
     * @param APIFormDhtmlTextArea $element form element
     *
     * @return string rendered buttons for apicode assistance
     */
    protected function renderFormDhtmlTAAPICode(APIFormDhtmlTextArea $element)
    {
        $textarea_id = $element->getName();
        $code = '';
        $code .= "<div class='row'><div class='col-md-12'>";
        $code .= "<button type='button' class='btn btn-default btn-sm' onclick='apiCodeUrl(\"{$textarea_id}\", \"" . htmlspecialchars(_ENTERURL, ENT_QUOTES) . "\", \"" . htmlspecialchars(_ENTERWEBTITLE, ENT_QUOTES) . "\");' onmouseover='style.cursor=\"hand\"' title='" . _API_FORM_ALT_URL . "'><span class='fa fa-fw fa-link' aria-hidden='true'></span></button>";
        $code .= "<button type='button' class='btn btn-default btn-sm' onclick='apiCodeEmail(\"{$textarea_id}\", \"" . htmlspecialchars(_ENTEREMAIL, ENT_QUOTES) . "\", \"" . htmlspecialchars(_ENTERWEBTITLE, ENT_QUOTES) . "\");' onmouseover='style.cursor=\"hand\"' title='" . _API_FORM_ALT_EMAIL . "'><span class='fa fa-fw fa-envelope-o' aria-hidden='true'></span></button>";
        $code .= "<button type='button' class='btn btn-default btn-sm' onclick='apiCodeImg(\"{$textarea_id}\", \"" . htmlspecialchars(_ENTERIMGURL, ENT_QUOTES) . "\", \"" . htmlspecialchars(_ENTERIMGPOS, ENT_QUOTES) . "\", \"" . htmlspecialchars(_IMGPOSRORL, ENT_QUOTES) . "\", \"" . htmlspecialchars(_ERRORIMGPOS, ENT_QUOTES) . "\", \"" . htmlspecialchars(_API_FORM_ALT_ENTERWIDTH, ENT_QUOTES) . "\");' onmouseover='style.cursor=\"hand\"' title='" . _API_FORM_ALT_IMG . "'><span class='fa fa-fw fa-file-image-o' aria-hidden='true'></span></button>";
        $code .= "<button type='button' class='btn btn-default btn-sm' onclick='openWithSelfMain(\"" . API_URL . "/imagemanager.php?target={$textarea_id}\",\"imgmanager\",400,430);' onmouseover='style.cursor=\"hand\"' title='" . _API_FORM_ALT_IMAGE . "'><span class='fa fa-file-image-o' aria-hidden='true'></span><small> Manager</small></button>";
        $code .= "<button type='button' class='btn btn-default btn-sm' onclick='openWithSelfMain(\"" . API_URL . "/misc.php?action=showpopups&amp;type=smilies&amp;target={$textarea_id}\",\"smilies\",300,475);' onmouseover='style.cursor=\"hand\"' title='" . _API_FORM_ALT_SMILEY . "'><span class='fa fa-fw fa-smile-o' aria-hidden='true'></span></button>";

        $myts = MyTextSanitizer::getInstance();

        $extensions = array_filter($myts->config['extensions']);
        foreach (array_keys($extensions) as $key) {
            $extension = $myts->loadExtension($key);
            @list($encode, $js) = $extension->encode($textarea_id);
            if (empty($encode)) {
                continue;
            }
            $code .= $encode;
            if (!empty($js)) {
                $element->js .= $js;
            }
        }
        $code .= "<button type='button' class='btn btn-default btn-sm' onclick='apiCodeCode(\"{$textarea_id}\", \"" . htmlspecialchars(_ENTERCODE, ENT_QUOTES) . "\");' onmouseover='style.cursor=\"hand\"' title='" . _API_FORM_ALT_CODE . "'><span class='fa fa-fw fa-code' aria-hidden='true'></span></button>";
        $code .= "<button type='button' class='btn btn-default btn-sm' onclick='apiCodeQuote(\"{$textarea_id}\", \"" . htmlspecialchars(_ENTERQUOTE, ENT_QUOTES) . "\");' onmouseover='style.cursor=\"hand\"' title='" . _API_FORM_ALT_QUOTE . "'><span class='fa fa-fw fa-quote-right' aria-hidden='true'></span></button>";
        $code .= "</div></div>";

        $apiPreload = APIPreload::getInstance();
        $apiPreload->triggerEvent('core.class.apiform.formdhtmltextarea.codeicon', array(&$code));

        return $code;
    }

    /**
     * Render typography controls for editor (font, size, color)
     *
     * @param APIFormDhtmlTextArea $element form element
     *
     * @return string rendered typography controls
     */
    protected function renderFormDhtmlTATypography(APIFormDhtmlTextArea $element)
    {
        $textarea_id = $element->getName();
        $hiddentext  = $element->_hiddenText;

        $fontarray = !empty($GLOBALS['formtextdhtml_fonts']) ? $GLOBALS['formtextdhtml_fonts'] : array(
            'Arial',
            'Courier',
            'Georgia',
            'Helvetica',
            'Impact',
            'Verdana',
            'Haettenschweiler');

        $colorArray = array(
            'Black'  => '000000',
            'Blue'   => '38AAFF',
            'Brown'  => '987857',
            'Green'  => '79D271',
            'Grey'   => '888888',
            'Orange' => 'FFA700',
            'Paper'  => 'E0E0E0',
            'Purple' => '363E98',
            'Red'    => 'FF211E',
            'White'  => 'FEFEFE',
            'Yellow' => 'FFD628',
        );

        $fontStr = '<div class="row"><div class="col-md-12"><div class="btn-group" role="toolbar">';
        $fontStr .= '<div class="btn-group">'
            . '<button type="button" class="btn btn-default btn-sm dropdown-toggle" title="'. _SIZE .'"'
            . ' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
            . '<span class = "glyphicon glyphicon-text-height"></span><span class="caret"></span></button>'
            . '<ul class="dropdown-menu">';
            //. _SIZE . '&nbsp;&nbsp;<span class="caret"></span></button><ul class="dropdown-menu">';
        foreach ($GLOBALS['formtextdhtml_sizes'] as $value => $name) {
            $fontStr .= '<li><a href="javascript:apiSetElementAttribute(\'size\', \'' . $value . '\', \''
                . $textarea_id . '\', \'' . $hiddentext . '\');">' . $name . '</a></li>';
        }
        $fontStr .= '</ul></div>';

        $fontStr .= '<div class="btn-group">'
            . '<button type="button" class="btn btn-default btn-sm dropdown-toggle" title="'. _FONT .'"'
            . ' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
            . '<span class = "glyphicon glyphicon-font"></span><span class="caret"></span></button>'
            . '<ul class="dropdown-menu">';
            //. _FONT . '&nbsp;&nbsp;<span class="caret"></span></button><ul class="dropdown-menu">';
        foreach ($fontarray as $font) {
            $fontStr .= '<li><a href="javascript:apiSetElementAttribute(\'font\', \'' . $font . '\', \''
                . $textarea_id . '\', \'' . $hiddentext . '\');">' . $font . '</a></li>';
        }
        $fontStr .= '</ul></div>';

        $fontStr .= '<div class="btn-group">'
            . '<button type="button" class="btn btn-default btn-sm dropdown-toggle" title="'. _COLOR .'"'
            . ' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
            . '<span class = "glyphicon glyphicon-text-color"></span><span class="caret"></span></button>'
            . '<ul class="dropdown-menu">';
            //. _COLOR . '&nbsp;&nbsp;<span class="caret"></span></button><ul class="dropdown-menu">';
        foreach ($colorArray as $color => $hex) {
            $fontStr .= '<li><a href="javascript:apiSetElementAttribute(\'color\', \'' . $hex . '\', \''
                . $textarea_id . '\', \'' . $hiddentext . '\');">'
                . '<span style="color:#' . $hex . ';">' . $color .'</span></a></li>';
        }
        $fontStr .= '</ul></div>';
        $fontStr .= '</div>';

        //$styleStr = "<div class='row'><div class='col-md-12'>";
        $styleStr  = "<div class='btn-group' role='group'>";
        $styleStr .= "<button type='button' class='btn btn-default btn-sm' onclick='apiMakeBold(\"{$hiddentext}\", \"{$textarea_id}\");' title='" . _API_FORM_ALT_BOLD . "' aria-label='Left Align'><span class='fa fa-bold' aria-hidden='true'></span></button>";
        $styleStr .= "<button type='button' class='btn btn-default btn-sm' onclick='apiMakeItalic(\"{$hiddentext}\", \"{$textarea_id}\");' title='" . _API_FORM_ALT_ITALIC . "' aria-label='Left Align'><span class='fa fa-italic' aria-hidden='true'></span></button>";
        $styleStr .= "<button type='button' class='btn btn-default btn-sm' onclick='apiMakeUnderline(\"{$hiddentext}\", \"{$textarea_id}\");' title='" . _API_FORM_ALT_UNDERLINE . "' aria-label='Left Align'>" . '<span class="fa fa-underline"></span></button>';
        $styleStr .= "<button type='button' class='btn btn-default btn-sm' onclick='apiMakeLineThrough(\"{$hiddentext}\", \"{$textarea_id}\");' title='" . _API_FORM_ALT_LINETHROUGH . "' aria-label='Left Align'>" . '<span class="fa fa-strikethrough"></span></button>';
        $styleStr .= "</div>";

        $alignStr = "<div class='btn-group' role='group'>";
        $alignStr .= "<button type='button' class='btn btn-default btn-sm' onclick='apiMakeLeft(\"{$hiddentext}\", \"{$textarea_id}\");' title='" . _API_FORM_ALT_LEFT . "' aria-label='Left Align'><span class='fa fa-align-left' aria-hidden='true'></span></button>";
        $alignStr .= "<button type='button' class='btn btn-default btn-sm' onclick='apiMakeCenter(\"{$hiddentext}\", \"{$textarea_id}\");' title='" . _API_FORM_ALT_CENTER . "' aria-label='Left Align'><span class='fa fa-align-center' aria-hidden='true'></span></button>";
        $alignStr .= "<button type='button' class='btn btn-default btn-sm' onclick='apiMakeRight(\"{$hiddentext}\", \"{$textarea_id}\");' title='" . _API_FORM_ALT_RIGHT . "' aria-label='Left Align'><span class='fa fa-align-right' aria-hidden='true'></span></button>";
        $alignStr .= "</div>";

        $fontStr .= "&nbsp;{$styleStr}&nbsp;{$alignStr}&nbsp;\n";

        $fontStr .= "<button type='button' class='btn btn-default btn-sm' onclick=\"APICheckLength('"
            . $element->getName() . "', '" . @$element->configs['maxlength'] . "', '"
            . _API_FORM_ALT_LENGTH . "', '" . _API_FORM_ALT_LENGTH_MAX . "');\" title='"
            . _API_FORM_ALT_CHECKLENGTH . "'><span class='fa fa-check-square-o' aria-hidden='true'></span></button>";
        $fontStr .= "</div></div>";

        return $fontStr;
    }

    /**
     * Render support for APIFormElementTray
     *
     * @param APIFormElementTray $element form element
     *
     * @return string rendered form element
     */
    public function renderFormElementTray(APIFormElementTray $element)
    {
        $count = 0;
        $ret = '<span class="form-inline">';
        foreach ($element->getElements() as $ele) {
            if ($count > 0) {
                $ret .= $element->getDelimeter();
            }
            if ($ele->getCaption() != '') {
                $ret .= $ele->getCaption() . '&nbsp;';
            }
            $ret .= $ele->render() . NWLINE;
            if (!$ele->isHidden()) {
                ++$count;
            }
        }
        /*
        if (substr_count($ret, '<div class="form-group form-inline">') > 0) {
            $ret = str_replace('<div class="form-group form-inline">', '', $ret);
            $ret = str_replace('</div>', '', $ret);
        }
        if (substr_count($ret, '<div class="checkbox-inline">') > 0) {
            $ret = str_replace('<div class="checkbox-inline">', '', $ret);
        }
        */
        $ret .= '</span>';
        return $ret;
    }

    /**
     * Render support for APIFormFile
     *
     * @param APIFormFile $element form element
     *
     * @return string rendered form element
     */
    public function renderFormFile(APIFormFile $element)
    {
        return '<input class="form-control-static" type="file" name="' . $element->getName()
            . '" id="' . $element->getName()
            . '" title="' . $element->getTitle() . '" ' . $element->getExtra() . ' />'
            . '<input type="hidden" name="MAX_FILE_SIZE" value="' . $element->getMaxFileSize() . '" />'
            . '<input type="hidden" name="api_upload_file[]" id="api_upload_file[]" value="'
            . $element->getName() . '" />';
    }

    /**
     * Render support for APIFormLabel
     *
     * @param APIFormLabel $element form element
     *
     * @return string rendered form element
     */
    public function renderFormLabel(APIFormLabel $element)
    {
        return '<div class="form-control-static">' . $element->getValue() . '</div>';
    }

    /**
     * Render support for APIFormPassword
     *
     * @param APIFormPassword $element form element
     *
     * @return string rendered form element
     */
    public function renderFormPassword(APIFormPassword $element)
    {
        return '<input class="form-control" type="password" name="'
            . $element->getName() . '" id="' . $element->getName() . '" size="' . $element->getSize()
            . '" maxlength="' . $element->getMaxlength() . '" value="' . $element->getValue() . '"'
            . $element->getExtra() . ' ' . ($element->autoComplete ? '' : 'autocomplete="off" ') . '/>';
    }

    /**
     * Render support for APIFormRadio
     *
     * @param APIFormRadio $element form element
     *
     * @return string rendered form element
     */
    public function renderFormRadio(APIFormRadio $element)
    {

        $elementName = $element->getName();
        $elementId = $elementName;

        switch ((int) ($element->columns)) {
            case 0:
                return $this->renderCheckedInline($element, 'radio', $elementId, $elementName);
            case 1:
                return $this->renderCheckedOneColumn($element, 'radio', $elementId, $elementName);
            default:
                return $this->renderCheckedColumnar($element, 'radio', $elementId, $elementName);
        }
    }

    /**
     * Render support for APIFormSelect
     *
     * @param APIFormSelect $element form element
     *
     * @return string rendered form element
     */
    public function renderFormSelect(APIFormSelect $element)
    {
        $ele_name    = $element->getName();
        $ele_title   = $element->getTitle();
        $ele_value   = $element->getValue();
        $ele_options = $element->getOptions();
        $ret = '<select class="form-control" size="'
            . $element->getSize() . '"' . $element->getExtra();
        if ($element->isMultiple() != false) {
            $ret .= ' name="' . $ele_name . '[]" id="' . $ele_name . '" title="' . $ele_title
                . '" multiple="multiple">';
        } else {
            $ret .= ' name="' . $ele_name . '" id="' . $ele_name . '" title="' . $ele_title . '">';
        }
        foreach ($ele_options as $value => $name) {
            $ret .= '<option value="' . htmlspecialchars($value, ENT_QUOTES) . '"';
            if (count($ele_value) > 0 && in_array($value, $ele_value)) {
                $ret .= ' selected';
            }
            $ret .= '>' . $name . '</option>';
        }
        $ret .= '</select>';

        return $ret;
    }
    /**
     * Render support for APIFormText
     *
     * @param APIFormText $element form element
     *
     * @return string rendered form element
     */
    public function renderFormText(APIFormText $element)
    {
        return "<input class='form-control' type='text' name='"
            . $element->getName() . "' title='" . $element->getTitle() . "' id='" . $element->getName()
            . "' size='" . $element->getSize() . "' maxlength='" . $element->getMaxlength()
            . "' value='" . $element->getValue() . "'" . $element->getExtra() . ' />';
    }

    /**
     * Render support for APIFormTextArea
     *
     * @param APIFormTextArea $element form element
     *
     * @return string rendered form element
     */
    public function renderFormTextArea(APIFormTextArea $element)
    {
        return "<textarea class='form-control' name='"
            . $element->getName() . "' id='" . $element->getName() . "'  title='" . $element->getTitle()
            . "' rows='" . $element->getRows() . "' cols='" . $element->getCols() . "'"
            . $element->getExtra() . '>' . $element->getValue() . '</textarea>';
    }

    /**
     * Render support for APIFormTextDateSelect
     *
     * @param APIFormTextDateSelect $element form element
     *
     * @return string rendered form element
     */
    public function renderFormTextDateSelect(APIFormTextDateSelect $element)
    {
        static $included = false;
        if (file_exists(API_ROOT_PATH . '/language/' . $GLOBALS['apiConfig']['language'] . '/calendar.php')) {
            include_once API_ROOT_PATH . '/language/' . $GLOBALS['apiConfig']['language'] . '/calendar.php';
        } else {
            include_once API_ROOT_PATH . '/language/english/calendar.php';
        }

        $ele_name  = $element->getName();
        $ele_value = $element->getValue(false);
        if (is_string($ele_value)) {
            $display_value = $ele_value;
            $ele_value     = time();
        } else {
            $display_value = date(_SHORTDATESTRING, $ele_value);
        }

        $jstime = formatTimestamp($ele_value, _SHORTDATESTRING);
        if (isset($GLOBALS['xoTheme']) && is_object($GLOBALS['xoTheme'])) {
            $GLOBALS['xoTheme']->addScript('include/calendar.js');
            $GLOBALS['xoTheme']->addStylesheet('include/calendar-blue.css');
            if (!$included) {
                $included = true;
                $GLOBALS['xoTheme']->addScript('', '', '
                    var calendar = null;

                    function selected(cal, date)
                    {
                    cal.sel.value = date;
                    }

                    function closeHandler(cal)
                    {
                    cal.hide();
                    Calendar.removeEvent(document, "mousedown", checkCalendar);
                    }

                    function checkCalendar(ev)
                    {
                    var el = Calendar.is_ie ? Calendar.getElement(ev) : Calendar.getTargetElement(ev);
                    for (; el != null; el = el.parentNode)
                    if (el == calendar.element || el.tagName == "A") break;
                    if (el == null) {
                    calendar.callCloseHandler(); Calendar.stopEvent(ev);
                    }
                    }
                    function showCalendar(id)
                    {
                    var el = apiGetElementById(id);
                    if (calendar != null) {
                    calendar.hide();
                    } else {
                    var cal = new Calendar(true, "' . $jstime . '", selected, closeHandler);
                    calendar = cal;
                    cal.setRange(1900, 2100);
                    calendar.create();
                    }
                    calendar.sel = el;
                    calendar.parseDate(el.value);
                    calendar.showAtElement(el);
                    Calendar.addEvent(document, "mousedown", checkCalendar);

                    return false;
                    }

                    Calendar._DN = new Array
                    ("' . _CAL_SUNDAY . '",
                    "' . _CAL_MONDAY . '",
                    "' . _CAL_TUESDAY . '",
                    "' . _CAL_WEDNESDAY . '",
                    "' . _CAL_THURSDAY . '",
                    "' . _CAL_FRIDAY . '",
                    "' . _CAL_SATURDAY . '",
                    "' . _CAL_SUNDAY . '");
                    Calendar._MN = new Array
                    ("' . _CAL_JANUARY . '",
                    "' . _CAL_FEBRUARY . '",
                    "' . _CAL_MARCH . '",
                    "' . _CAL_APRIL . '",
                    "' . _CAL_MAY . '",
                    "' . _CAL_JUNE . '",
                    "' . _CAL_JULY . '",
                    "' . _CAL_AUGUST . '",
                    "' . _CAL_SEPTEMBER . '",
                    "' . _CAL_OCTOBER . '",
                    "' . _CAL_NOVEMBER . '",
                    "' . _CAL_DECEMBER . '");

                    Calendar._TT = {};
                    Calendar._TT["TOGGLE"] = "' . _CAL_TGL1STD . '";
                    Calendar._TT["PREV_YEAR"] = "' . _CAL_PREVYR . '";
                    Calendar._TT["PREV_MONTH"] = "' . _CAL_PREVMNTH . '";
                    Calendar._TT["GO_TODAY"] = "' . _CAL_GOTODAY . '";
                    Calendar._TT["NEXT_MONTH"] = "' . _CAL_NXTMNTH . '";
                    Calendar._TT["NEXT_YEAR"] = "' . _CAL_NEXTYR . '";
                    Calendar._TT["SEL_DATE"] = "' . _CAL_SELDATE . '";
                    Calendar._TT["DRAG_TO_MOVE"] = "' . _CAL_DRAGMOVE . '";
                    Calendar._TT["PART_TODAY"] = "(' . _CAL_TODAY . ')";
                    Calendar._TT["MON_FIRST"] = "' . _CAL_DISPM1ST . '";
                    Calendar._TT["SUN_FIRST"] = "' . _CAL_DISPS1ST . '";
                    Calendar._TT["CLOSE"] = "' . _CLOSE . '";
                    Calendar._TT["TODAY"] = "' . _CAL_TODAY . '";

                    // date formats
                    Calendar._TT["DEF_DATE_FORMAT"] = "' . _SHORTDATESTRING . '";
                    Calendar._TT["TT_DATE_FORMAT"] = "' . _SHORTDATESTRING . '";

                    Calendar._TT["WK"] = "";
                ');
            }
        }
        return '<div class="input-group">'
            . '<input class="form-control" type="text" name="' . $ele_name . '" id="' . $ele_name
            . '" size="' . $element->getSize() . '" maxlength="' . $element->getMaxlength()
            . '" value="' . $display_value . '"' . $element->getExtra() . ' />'
            . '<span class="input-group-btn"><button class="btn btn-default" type="button"'
            . ' onclick="return showCalendar(\'' . $ele_name . '\');">'
            . '<span class="fa fa-calendar" aria-hidden="true"></span></button>'
            . '</span>'
            . '</div>';
    }

    /**
     * Render support for APIThemeForm
     *
     * @param APIThemeForm $form form to render
     *
     * @return string rendered form
     */
    public function renderThemeForm(APIThemeForm $form)
    {
        $ele_name = $form->getName();

        $ret = '<div>';
        $ret .= '<form class="form-horizontal" name="' . $ele_name . '" id="' . $ele_name . '" action="'
            . $form->getAction() . '" method="' . $form->getMethod()
            . '" onsubmit="return apiFormValidate_' . $ele_name . '();"' . $form->getExtra() . '>'
            . '<h3>' . $form->getTitle() . '</h3>';
        $hidden   = '';

        foreach ($form->getElements() as $element) {
            if (!is_object($element)) { // see $form->addBreak()
                $ret .= $element;
                continue;
            }
            if ($element->isHidden()) {
                $hidden .= $element->render();
                continue;
            }

            $ret .= '<div class="form-group">';
            if (($caption = $element->getCaption()) != '') {
                $ret .= '<label for="' . $element->getName() . '" class="col-md-2 control-label">'
                    . $element->getCaption()
                    . ($element->isRequired() ? '<span class="caption-required">*</span>' : '')
                    . '</label>';
            } else {
                $ret .= '<div class="col-md-2"> </div>';
            }
            $ret .= '<div class="col-md-10">';
            $ret .= $element->render();
            if (($desc = $element->getDescription()) != '') {
                $ret .= '<p class="help-block">' . $desc . '</p>';
            }
            $ret .= '</div>';
            $ret .= '</div>';
        }
        $ret .= $hidden;
        $ret .= '</form></div>';
        $ret .= $form->renderValidationJS(true);

        return $ret;
    }

    /**
     * Support for themed addBreak
     *
     * @param APIThemeForm $form
     * @param string         $extra pre-rendered content for break row
     * @param string         $class class for row
     *
     * @return void
     */
    public function addThemeFormBreak(APIThemeForm $form, $extra, $class)
    {
        $class = ($class != '') ? preg_replace('/[^A-Za-z0-9\s\s_-]/i', '', $class) : '';
        $form->addElement('<div class="col-sm-12 ' . $class .'">'. $extra . '</div>');
    }
}
