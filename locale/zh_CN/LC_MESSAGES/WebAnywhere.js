var wa_text = new Array();
wa_text[""]="";
wa_text["Go"]="浏览";
wa_text["Next"]="前进";
wa_text["Previous"]="后退";
wa_text["Type a string to find in the current page"]="输入字符串，在本页中查找";
wa_text["Location field text area:"]="地址栏：";
wa_text["Invalid key press"]="无效按键";
wa_text["Welcome to Web Anywhere"]="欢迎访问Web Anywhere";
wa_text["Headings"]="标题";
wa_text["Heading"]="标题";
wa_text["Links"]="链接";
wa_text["Link"]="链接";
wa_text["End of page"]="页末";
wa_text["Start of page"]="页首";
wa_text["Not in a table."]="不在表格中";
wa_text["no"]="没有";
wa_text["Welcome to WebAnywhere"]="欢迎访问Web Anywhere";

function wa_gettext(text) {
  if (wa_text[text]) {
    return wa_text[text];
  } else {
    return text;
  }
}