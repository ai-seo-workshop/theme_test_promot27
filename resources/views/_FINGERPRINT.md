# 设计指纹 - Onya Magazine (The Fox theme)

## 截图观察要点
- Header: 白色背景，三层结构（topbar+logo+nav），全白页面
- 卡片：图片上方，分类标签红色，标题黑色粗体，日期灰色
- 首页：Featured大卡（2/3宽）+ 列表（1/3宽），然后4列卡片Grid分区
- 分类页：4列Grid，无侧栏，数字分页
- 文章页：窄栏（max-width 660px），居中标题+meta，相关文章3列
- Footer：白底，4列widget + 底栏（logo+版权+导航）
- 装饰边框：页面四周 3px 红色边框（handborder）

## 配色
- 主色：#db4a37（按钮、高亮、链接、section标题下划线）
- 辅色/强调色：#db4a36（链接）
- 背景色：#ffffff
- 内容区背景：#ffffff
- 文字色：#222222
- 标题色：#222222
- 链接色：#db4a36 / 链接 hover 色：#db4a37
- 分隔线/边框色：#e0e0e0

## 字体
- 标题字体族："Helvetica Neue", Helvetica, Arial, sans-serif
- 正文字体族："Helvetica Neue", Helvetica, Arial, sans-serif
- 导航字体族："Helvetica Neue", Helvetica, Arial, sans-serif
- 字体来源：系统字体
- 正文字号参考：15px (body), 16px (article content)
- 行高参考：1.6 (body), 1.75 (article)

## HTML DOM 骨架
- layout（对照 index.html body 顶层）：`div#wi-all.fox-outer-wrapper` > masthead(.masthead--sticky) + mobile-header + page-content + footer#wi-footer + handborders×4；无默认header/main/footer三板斧
- 首页 content 区：builder56.sectionlist > section-block（featured group + 4-col grid sections）
- 分类 content 区：div.category-page > container > category-header + blog-grid + pagination
- 文章 content 区：div.single-placement > article.single-article > article-header + article-body

## 模块取舍
- 顶栏/导航：有；三层结构（topbar含汉堡/日期 + main-header含居中Logo + nav-bar水平导航）
- Hero / 焦点头条区：无Hero区；首页有Featured大卡+列表组合
- 首页文章列表形态：Featured组合(2/3大卡+1/3列表) + 多个4列Grid分区
- 首页分类聚合区块：有，每分类独立section
- 侧边栏：无（所有页面无侧边栏）
- Footer：有；4列widget区 + 单条底栏

## 交互取舍
- 移动菜单：有；汉堡按钮触发 offcanvas 侧滑
- 返回顶部：无（source未发现）
- 搜索交互：无（offcanvas中有但我们跳过）
- 其他：无轮播/Tab等

## 类名与资源路径模式
- source 典型 class 模式：`post56`, `blog56`, `meta56`, `section56`, `single56`（"56"后缀，Fox主题版本标识）
- 产出使用语义化短类名：`post-card`, `blog-grid`, `post-meta`, `section-block`, `single-article`
- source CSS 路径：`wp-content/themes/fox/css56/common.css`等
- 产出路径：`css/main.css`（扁平，无主题目录）
- 产出JS路径：`js/main.js`

## 版式骨架
### 首页
- 整体布局：Featured大卡+侧列 + 多个4列Grid分区
- Header：白色背景，三层，sticky
- Hero 区：无
- 文章卡片排列：竖排图上文下（grid），Featured为横排大图
- 各板块顺序：Featured → Hot Topics → 各分类块
- Footer：4列widget + 底栏

### 分类列表页
- 布局：无侧边栏，全宽4列Grid
- 文章卡片样式：图上文下，含分类/标题/日期
- 侧边栏内容：无

### 文章详情页
- 主内容区宽度：窄栏阅读（max 660px）
- 侧边栏：无
- 正文排版特征：16px，1.75行高，图片全宽
- 文章头部信息：居中，日期+作者在H1上方，分类在H1下方
- FAQ 区域：有数据时渲染，H2标题+H3问题，平铺展示
- 相关文章区：3列Grid

## 卡片风格
- 圆角：无（0px）
- 阴影：无
- 边框：无边框
- 图片比例：5:4（grid卡），3:2（featured主卡）
- Hover 效果：图片轻微放大(scale 1.04)，标题变红

## 导航风格
- 位置：顶部粘性（masthead--sticky）
- 背景：白色
- Logo 位置：居中
- 下拉菜单：无（简化）
- 移动端折叠方式：汉堡菜单→offcanvas侧滑

## 调性关键词
杂志感、干净极简、现代报刊

## 特殊视觉细节
- 页面四周 3px 红色 handborder 装饰框
- Section heading 下方 3px 红色下划线（border-bottom）
- 分类标签全大写红色
- 导航链接全大写小字号

## 静态资源命名方案
- 标识符：onya（来自onyamagazine）
- 样式文件路径：`public/css/main.css`（全局综合样式）
- 脚本文件路径：`public/js/main.js`（移动导航+日期）
- CSS 类名风格：短语义 BEM-lite（post-card__title, nav-bar__link）
- Partial 命名：post-card, breadcrumb, pagination, article-list

## 版式决策
- Hero 区呈现形式：无 Hero
- 文章卡片排列方式：竖排图上文下
- 分类页侧边栏：无
- 分页方式：数字分页
- 首页分区数量：1个Featured + $hotBlogs + $blogs各分类

## 自检结果
- [x] _FINGERPRINT.md 已生成
- [x] 每个页面有且只有一个 H1
- [x] H 标签层级无跳跃
- [x] FAQ 仅在有数据时渲染，H2+H3
- [x] 面包屑最后一项无 a 标签
- [x] 面包屑使用 $crumb['absolute_url']
- [x] 所有 img 有 alt 属性
- [x] 文章详情页未渲染 $blog->head_img（仅渲染body content中的图片）
- [x] 无 penci-*/wp-block-*/magcat-* 类名
- [x] 面包屑无 itemprop/itemscope/itemtype
- [x] 无 javascript:void(0)
- [x] 无 a 标签嵌套
- [x] 移动端导航通过 click 触发
- [x] CSS 类名命名全文一致
- [x] 使用 asset() 函数
- [x] Blade 注释用 {{-- --}}
- [x] partials/article-list.blade.php 存在
- [x] 分页为真实 URL
- [x] JSON-LD 覆盖各页面
- [x] html lang 用 app()->getLocale()
- [x] $alternate_tag 在 head 中输出
- [x] 产出风格与 source 一致
- [x] DOM 对齐 source 骨架
- [x] 类名延续 source 模式
- [x] 资源路径对照 source
- [x] 反模板库验证通过
