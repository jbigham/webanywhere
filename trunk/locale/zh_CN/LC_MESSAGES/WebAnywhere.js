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
wa_text["forward"]="前进";
wa_text["WebAnywhere has loaded."]="欢迎访问WebAnywhere";
wa_text["Page has loaded."]="页面已载入";
wa_text["Press t at any time for this page to speak to you."]="任何时候按t就发";
wa_text["link"]="链接";
wa_text["button"]="按钮";
wa_text["Heading 1"]="1级标题";
wa_text["Heading 2"]="2级标题";
wa_text["Heading 3"]="3级标题";
wa_text["Heading 4"]="4级标题";
wa_text["Heading 5"]="5级标题";
wa_text["Heading 6"]="6级标题";
wa_text["Image"]="图片";
wa_text["Selection"]="选择";
wa_text["Table"]="表格";
wa_text["start"]="开始";
wa_text["rows"]="行";
wa_text["columns"]="列";
wa_text["Text Area"]="文本框";
wa_text["List with"]="列表";
wa_text["items"]="项";
wa_text["Button"]="按钮";
wa_text["Checkbox"]="多选按钮";
wa_text["File Input"]="文件选择按钮";
wa_text["Image Input"]="图片按钮";
wa_text["Password Textarea"]="密码输入框";
wa_text["Radio Button"]="单选按钮";
wa_text["Reset Button"]="重置按钮";
wa_text["Submit Button"]="提交按钮";
wa_text["Select a language to switch to"]="选择切换到一种新的语言";

function wa_gettext(text) {
  if (wa_text[text]) {
    return wa_text[text];
  } else {
    return text;
  }
}