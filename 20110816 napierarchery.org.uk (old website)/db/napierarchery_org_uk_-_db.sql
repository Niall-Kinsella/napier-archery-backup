-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2011 at 05:09 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `#mysql50#napierarchery_org_uk_-_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL DEFAULT '',
  `password` varchar(225) NOT NULL DEFAULT '',
  `name` varchar(225) NOT NULL DEFAULT '',
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` VALUES(1, 'gaspaniceh', 'wfarwdcw', 'Ross Cranford');
INSERT INTO `admins` VALUES(2, 'napierarchery', 'nuacsite', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `chicken`
--

CREATE TABLE `chicken` (
  `questionid` bigint(20) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `timestamp` varchar(50) NOT NULL DEFAULT '',
  `host` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`questionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=728 ;

--
-- Dumping data for table `chicken`
--

INSERT INTO `chicken` VALUES(306, 'are you fine?', '1134090335', 'user-4490.l6.c4.dsl.pol.co.uk', 'actually, yeah!');
INSERT INTO `chicken` VALUES(43, 'Can you give me a yes?', '1131567612', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'yes!!!!!');
INSERT INTO `chicken` VALUES(44, 'Can you give me a no?', '1131567628', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'of course!');
INSERT INTO `chicken` VALUES(45, 'Are you the true enlightened chicken of our times?', '1131569112', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'Indeedio');
INSERT INTO `chicken` VALUES(46, 'Did you have a cameo role in Shaft?', '1131569127', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'abraca-duh! You have to ask?');
INSERT INTO `chicken` VALUES(442, 'Do you represent well?', '1141808732', 'gateway-202.energis.gsi.gov.uk', 'of course!');
INSERT INTO `chicken` VALUES(393, 'Would you like some of my Sunny D?', '1139315982', 'gateway-202.energis.gsi.gov.uk', 'er, no');
INSERT INTO `chicken` VALUES(394, 'salut, tu parles francais?', '1139405211', '146.176.236.28', 'er, no');
INSERT INTO `chicken` VALUES(395, 'Do you pick the team at Tynecastle?', '1139485160', 'gateway-202.energis.gsi.gov.uk', 'er, no');
INSERT INTO `chicken` VALUES(396, 'can u do a wibble wobble?', '1139573001', '87.246.65.82', 'of course!');
INSERT INTO `chicken` VALUES(55, 'Have I eaten too much chocolate today?', '1131589213', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'abraca-duh! You have to ask?');
INSERT INTO `chicken` VALUES(397, 'Do you like George W Bush???', '1139580703', '87.246.65.114', 'er, no');
INSERT INTO `chicken` VALUES(59, 'No but really, have you got bird flu?', '1131621735', 'gateway-202.energis.gsi.gov.uk', 'you''re a smoothy, but alas, the answer''s no!');
INSERT INTO `chicken` VALUES(60, 'Do you like Christmas because all the turkeys get it?', '1131622115', 'gateway-202.energis.gsi.gov.uk', 'Indeedio');
INSERT INTO `chicken` VALUES(63, 'Will you do the shuffle truffle for me?', '1131665063', 'lithium.onspeed.com', 'why of course');
INSERT INTO `chicken` VALUES(431, 'can u shoot people?', '1141050622', 'pc022219.napier.ac.uk', 'er, no');
INSERT INTO `chicken` VALUES(135, 'Is ross an absolute banker?', '1131896109', 'shuttle.timelapse.bfdsl.net', 'no, but buying me some rizlas may change that answer');
INSERT INTO `chicken` VALUES(399, 'Will Scotland win the six nations?', '1139762255', 'host-83-146-30-196.bulldogdsl.com', 'er, no');
INSERT INTO `chicken` VALUES(73, 'Is star wars episode 2 better than the old films?', '1131666268', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'Please insert another coin to continue (no)');
INSERT INTO `chicken` VALUES(74, 'Is it true that in the beginning the chicken came before the egg?', '1131666302', '24-216-140-114.dhcp.stls.mo.charter.com', 'Negative, soldier! Back to work!');
INSERT INTO `chicken` VALUES(76, 'Should i have another dog?', '1131666855', '80-44-74-94.dynamic.dsl.as9105.com', 'yes, but you have much to learn');
INSERT INTO `chicken` VALUES(504, 'will we win?', '1145983125', 'host030.subnet10.dundee.ac.uk', 'yes, but you have much to learn');
INSERT INTO `chicken` VALUES(78, 'Should i study physiotherapy?', '1131667130', '80-44-74-94.dynamic.dsl.as9105.com', 'No way! Don''t touch me there either!');
INSERT INTO `chicken` VALUES(79, 'Well medicine benefit me?', '1131667208', '80-44-74-94.dynamic.dsl.as9105.com', 'yes, but you have much to learn');
INSERT INTO `chicken` VALUES(462, 'Would you beat a Surrey Uni AC t-shirt in a yellow-ness contest?', '1142353299', 'gateway-101.energis.gsi.gov.uk', 'yes!!!!!');
INSERT INTO `chicken` VALUES(444, 'Is Iain Alastair\\''s Bitch?', '1141835017', '146.176.236.31', 'er, no');
INSERT INTO `chicken` VALUES(83, 'is it time for bed?', '1131668107', '80-44-74-94.dynamic.dsl.as9105.com', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(84, 'are you a bawbag?', '1131668964', '80-44-74-94.dynamic.dsl.as9105.com', 'well duh!');
INSERT INTO `chicken` VALUES(85, 'Do you take a lot of abuse on here?', '1131669050', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'Och aye');
INSERT INTO `chicken` VALUES(88, 'get much?', '1131669513', '80-44-74-94.dynamic.dsl.as9105.com', 'well duh!');
INSERT INTO `chicken` VALUES(89, 'Is chicken the new pork?', '1131669676', '80-44-74-94.dynamic.dsl.as9105.com', 'yes!!!!!');
INSERT INTO `chicken` VALUES(90, 'Is your favourite dance the funky chicken?', '1131669806', '80-44-74-94.dynamic.dsl.as9105.com', 'the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)');
INSERT INTO `chicken` VALUES(93, 'Do you know the Muffin Man?', '1131709501', 'gateway-202.energis.gsi.gov.uk', 'you''re a smoothy, but alas, the answer''s no!');
INSERT INTO `chicken` VALUES(94, 'Are you Keyser Soze?', '1131709569', 'gateway-202.energis.gsi.gov.uk', 'you WHAT?! Heck no!');
INSERT INTO `chicken` VALUES(95, 'Is there life on Mars?', '1131709637', 'gateway-202.energis.gsi.gov.uk', 'huh? what? erm, yes, and leave me be');
INSERT INTO `chicken` VALUES(96, 'Does stewart disrupt you whilst you\\''re trying to work?', '1131717525', 'pc060076.napier.ac.uk', 'Indeedio');
INSERT INTO `chicken` VALUES(97, 'Do you think Stewart will make a good rubber chicken in a next life!', '1131717579', 'pc060075.napier.ac.uk', 'huh? what? erm, yes, and leave me be');
INSERT INTO `chicken` VALUES(98, 'Will you spank my monkey?', '1131717753', 'pc060075.napier.ac.uk', 'of course!');
INSERT INTO `chicken` VALUES(100, 'Would I make a good Jedi Knight?', '1131717811', 'pc060075.napier.ac.uk', 'There''s about as much chance of me saying yes as there is of me buying Chicken Tonight!');
INSERT INTO `chicken` VALUES(101, 'Should I turn to the Dark side?', '1131717833', 'pc060075.napier.ac.uk', 'the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)');
INSERT INTO `chicken` VALUES(103, 'are you a virgin?', '1131718086', 'pc060075.napier.ac.uk', 'buy me another drink, elmo');
INSERT INTO `chicken` VALUES(434, 'a rubber duck?', '1141050667', 'pc022219.napier.ac.uk', 'of course!');
INSERT INTO `chicken` VALUES(105, 'Do you think people should pay for your \\"wisdom\\"?', '1131718227', 'pc060075.napier.ac.uk', 'well duh!');
INSERT INTO `chicken` VALUES(465, 'Got milk?', '1142424183', 'gateway-202.energis.gsi.gov.uk', 'why of course');
INSERT INTO `chicken` VALUES(109, 'Can I shoot you with an arrow?', '1131718466', 'pc060075.napier.ac.uk', 'yeah baby yeah!');
INSERT INTO `chicken` VALUES(111, 'Should I shoot boomerang\\''s from my bow instead of arrows?', '1131718597', 'pc060075.napier.ac.uk', 'Negative, soldier! Back to work!');
INSERT INTO `chicken` VALUES(112, 'Is dilbert the funniest cartoon in the world?', '1131718624', 'pc060075.napier.ac.uk', 'why of course');
INSERT INTO `chicken` VALUES(114, 'Should you be renamed the Chiken of lies?', '1131718711', 'pc060075.napier.ac.uk', 'Yeah but');
INSERT INTO `chicken` VALUES(507, 'will i live long and prosper?', '1146413112', '87.246.65.222', 'is the pope a catholic?');
INSERT INTO `chicken` VALUES(121, 'will craig pass his 3rd year?', '1131737650', 'fluorine.onspeed.com', 'Woop woop - affirmative alert');
INSERT INTO `chicken` VALUES(122, 'will any of craig\\''s arrows actually fletch straight?', '1131737701', 'fluorine.onspeed.com', 'yes!!!!!');
INSERT INTO `chicken` VALUES(123, 'have you ever been hit in the face by a frying pan?', '1131737724', 'fluorine.onspeed.com', 'not for you, not for anyone!');
INSERT INTO `chicken` VALUES(124, 'can i hit you with a wet fish?', '1131737738', 'fluorine.onspeed.com', 'of course!');
INSERT INTO `chicken` VALUES(125, 'Would you like a wet willy?', '1131737756', 'fluorine.onspeed.com', 'you WHAT?! Heck no!');
INSERT INTO `chicken` VALUES(126, 'Does stewart need more spare time to come and shoot arrows at inanimate objects?', '1131758290', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'is the pope a catholic?');
INSERT INTO `chicken` VALUES(127, 'Is the pope a catholic?', '1131787740', 'pc062035.napier.ac.uk', 'huh? what? erm, yes, and leave me be');
INSERT INTO `chicken` VALUES(128, 'Don\\''t you get the weekend off?', '1131801957', 'pc062035.napier.ac.uk', 'yes, but you have much to learn');
INSERT INTO `chicken` VALUES(130, 'are you insecure in your masculinity?', '1131834275', 'ACBC17EA.ipt.aol.com', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(131, 'do people keep trying to throttle/choke you,if yes,do you enjoy it?', '1131834320', 'ACBC17EA.ipt.aol.com', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(132, 'do you dream of electric sheep?', '1131834379', 'ACBC17EA.ipt.aol.com', 'well duh!');
INSERT INTO `chicken` VALUES(133, 'does your creater wear thongs?', '1131834471', 'ACBC17EA.ipt.aol.com', 'no, but buying me some rizlas may change that answer');
INSERT INTO `chicken` VALUES(134, 'if you always lie,does that mean i always tell the truth?and if so,you\\''re blue.', '1131834545', 'ACBC17EA.ipt.aol.com', 'don''t be daft, no way');
INSERT INTO `chicken` VALUES(136, 'Are you the Walrus?', '1131981334', 'gateway-202.energis.gsi.gov.uk', 'er, no');
INSERT INTO `chicken` VALUES(137, 'Is my shoulder any better tonight?', '1131990871', 'argon.onspeed.com', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(143, 'does my head hurt?', '1132045420', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'in the words of Shakespeare, ''Yes''');
INSERT INTO `chicken` VALUES(144, 'Will the penguin make it?', '1132069823', 'gateway-202.energis.gsi.gov.uk', 'why do you have to ask? yep!');
INSERT INTO `chicken` VALUES(145, 'does E really equal mc squared?', '1132101293', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'no but');
INSERT INTO `chicken` VALUES(146, 'are you the next einstein?', '1132101304', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'in the words of Bill Clinton, no!');
INSERT INTO `chicken` VALUES(147, 'Is the news of the world the best newspaper in the aforementioned world?', '1132101455', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'No way! Don''t touch me there either!');
INSERT INTO `chicken` VALUES(148, 'Are you powered by a HAL 9000?', '1132101470', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'No way! Don''t touch me there either!');
INSERT INTO `chicken` VALUES(149, 'Are you forever going to say \\"Dave, what are you doing Dave? Dave I think you\\''re overreacting...\\"?', '1132101499', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'no!!!');
INSERT INTO `chicken` VALUES(150, 'Do you think the government is watching you?', '1132225401', 'gateway-202.energis.gsi.gov.uk', 'in the words of Bill Clinton, no!');
INSERT INTO `chicken` VALUES(151, 'Is Stewart actually doing work today instead of asking you loads of questions?', '1132234104', 'sulphur.onspeed.com', 'you WHAT?! Heck no!');
INSERT INTO `chicken` VALUES(152, 'Do you ever say yes?', '1132251778', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'Indeedio');
INSERT INTO `chicken` VALUES(153, 'In the words of tenacious d, can i pluck you slowly?', '1132251845', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'yes, but you have much to learn');
INSERT INTO `chicken` VALUES(155, 'Do I believe you?', '1132252483', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'is the pope a catholic?');
INSERT INTO `chicken` VALUES(162, 'on yonder hill there stood a coo,it must hay shifted cos it\\''s nay there noo...is it my fault?', '1132448178', 'ACC8F322.ipt.aol.com', 'zzzzzZZZZZZ');
INSERT INTO `chicken` VALUES(163, 'Do you just sit and watch tv when you\\''re not answering questions?', '1132448285', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)');
INSERT INTO `chicken` VALUES(164, 'Do you ever wish you could say more than just yes or no?', '1132448324', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(169, 'Was the oracle at delphi your trainee?', '1132448550', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(170, 'Are ducks evil?', '1132448613', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'Yeah but');
INSERT INTO `chicken` VALUES(171, 'Is stewart better at archery than the average slice of toast (buttered or otherwise)?', '1132448647', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'Negative, soldier! Back to work!');
INSERT INTO `chicken` VALUES(175, 'a foolish chicken would say yes...', '1132448741', 'ACC8F322.ipt.aol.com', 'no, but buying me some rizlas may change that answer');
INSERT INTO `chicken` VALUES(176, 'Will it be a white Christmas this year?', '1132448839', 'user-7376.lns3-c10.dsl.pol.co.uk', 'is the pope a catholic?');
INSERT INTO `chicken` VALUES(177, 'Am I telling the truth?', '1132448848', 'user-7376.lns3-c10.dsl.pol.co.uk', 'yes, but you have much to learn');
INSERT INTO `chicken` VALUES(179, 'Am I telling the truth?', '1132448936', 'user-7376.lns3-c10.dsl.pol.co.uk', 'Indeedio');
INSERT INTO `chicken` VALUES(180, 'are you rally just a canary crossbred with a pineapple?', '1132448962', 'ACC8F322.ipt.aol.com', 'zzzzzZZZZZZ');
INSERT INTO `chicken` VALUES(181, 'Is it chicken overload?', '1132448982', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'zzzzzZZZZZZZ');
INSERT INTO `chicken` VALUES(182, 'Are you concerned about the possible impact of h5n1 avian flu in the scottish highlands?', '1132449013', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'huh? what? erm, yes, and leave me be');
INSERT INTO `chicken` VALUES(183, 'Am I telling the truth?', '1132449027', 'user-7376.lns3-c10.dsl.pol.co.uk', 'Woop woop - affirmative alert');
INSERT INTO `chicken` VALUES(184, 'do you feel used?', '1132449155', 'ACC8F322.ipt.aol.com', 'a big, fat, squeaky, NO!');
INSERT INTO `chicken` VALUES(185, 'do you really squeak or is that a rumour?', '1132449167', 'ACC8F322.ipt.aol.com', 'Negative, soldier! Back to work!');
INSERT INTO `chicken` VALUES(204, 'Should I get a bigger \\"Over Shoulder Boulder Holder?\\"', '1132612539', 'chlorine.onspeed.com', 'nahhhhhh');
INSERT INTO `chicken` VALUES(187, 'Am I an elf?', '1132449263', 'user-7376.lns3-c10.dsl.pol.co.uk', 'Woop woop - affirmative alert');
INSERT INTO `chicken` VALUES(188, 'Is there a parrot in our midst?!', '1132449283', 'user-7376.lns3-c10.dsl.pol.co.uk', 'nahhhhhh');
INSERT INTO `chicken` VALUES(201, 'Are you the daddy?', '1132612424', 'chlorine.onspeed.com', 'Negative, soldier! Back to work!');
INSERT INTO `chicken` VALUES(202, 'are you a nice piece of tender milf?', '1132612444', 'chlorine.onspeed.com', 'in the words of Bill Clinton, no!');
INSERT INTO `chicken` VALUES(191, 'Are there 2 parrots in our midst?!', '1132449391', 'user-7376.lns3-c10.dsl.pol.co.uk', 'abraca-duh! You have to ask?');
INSERT INTO `chicken` VALUES(223, 'Do you come from a land down under?', '1132672094', 'gateway-202.energis.gsi.gov.uk', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(193, 'Can you do the birdie dance?', '1132449854', 'user-7376.lns3-c10.dsl.pol.co.uk', 'Yes indeed my feathered friend');
INSERT INTO `chicken` VALUES(205, 'Was slim jim really slim?', '1132612554', 'chlorine.onspeed.com', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(206, 'Is Micky Mouse a Cherry Picker?', '1132612575', 'chlorine.onspeed.com', 'not for you, not for anyone!');
INSERT INTO `chicken` VALUES(207, 'Do you like Chicken Tonight?', '1132612635', 'chlorine.onspeed.com', 'yes, but you have much to learn');
INSERT INTO `chicken` VALUES(208, 'Will you ever shut up?', '1132612644', 'chlorine.onspeed.com', 'Please insert another coin to continue (no)');
INSERT INTO `chicken` VALUES(210, 'Are you a Haggis munching walnut?', '1132612687', 'chlorine.onspeed.com', 'well duh!');
INSERT INTO `chicken` VALUES(212, 'Are you a potato munching mush bag?', '1132612721', 'chlorine.onspeed.com', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(215, 'Do you actually understand the difference between a normal word and a nuaghty one?', '1132612831', 'chlorine.onspeed.com', 'a big, fat, squeaky, NO!');
INSERT INTO `chicken` VALUES(216, 'Should you name be changed to \\"The Chicken of Monkey Business\\"?', '1132612865', 'chlorine.onspeed.com', 'buy me another drink, elmo');
INSERT INTO `chicken` VALUES(490, 'Can I kick it?', '1144332866', 'gateway-101.energis.gsi.gov.uk', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(218, 'Can you actually count?', '1132612951', 'chlorine.onspeed.com', 'yeah baby yeah!');
INSERT INTO `chicken` VALUES(466, 'Should Iain do hard time for not paying his tv licence?', '1142537479', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'in the words of Shakespeare, ''Yes''');
INSERT INTO `chicken` VALUES(467, 'will you buy me a goat?', '1142616409', '87.246.65.82', 'ye.. ye... yea.... no!');
INSERT INTO `chicken` VALUES(222, 'your a clever little chicken aren\\''t you?', '1132613008', 'chlorine.onspeed.com', 'not for you, not for anyone!');
INSERT INTO `chicken` VALUES(226, 'am i purple?', '1132703097', 'www-proxy.oamk.fi', 'the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)');
INSERT INTO `chicken` VALUES(510, 'should we plough all of our money into the cherrytree money pit?', '1146690603', '82-39-177-181.stb.ubr01.gate.blueyonder.co.uk', 'a big, fat, squeaky, NO!');
INSERT INTO `chicken` VALUES(229, 'do you ever answer sensibly?', '1132707444', 'swan-cache-2.server.ntli.net', 'no but');
INSERT INTO `chicken` VALUES(230, 'Why does thunder come before lightning?', '1132707492', 'swan-cache-2.server.ntli.net', 'no but');
INSERT INTO `chicken` VALUES(232, 'Are you afraid of Virginia Woolf?', '1132765114', 'gateway-202.energis.gsi.gov.uk', 'ye.. ye... yea.... no!');
INSERT INTO `chicken` VALUES(233, 'Does the postman always ring twice?', '1132765132', 'gateway-202.energis.gsi.gov.uk', 'There''s about as much chance of me saying yes as there is of me buying Chicken Tonight!');
INSERT INTO `chicken` VALUES(234, 'Are you going to rock down to Electric Avenue?', '1132765163', 'gateway-202.energis.gsi.gov.uk', 'a big, fat, squeaky, NO!');
INSERT INTO `chicken` VALUES(235, 'Is it you what\\''s got a box on your head?', '1132765345', 'gateway-202.energis.gsi.gov.uk', 'zzzzzZZZZZZ');
INSERT INTO `chicken` VALUES(238, 'would you like to be melted down and re-cycled?', '1132780993', 'fluorine.onspeed.com', 'you WHAT?! Heck no!');
INSERT INTO `chicken` VALUES(239, 'Can we melt down 365 of you and call it a good year?', '1132781071', 'fluorine.onspeed.com', 'not for you, not for anyone!');
INSERT INTO `chicken` VALUES(240, 'Have you considered plastic surgery?', '1132781098', 'fluorine.onspeed.com', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(241, 'Is your belly really a magic eight ball in disguise?', '1132781118', 'fluorine.onspeed.com', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(242, 'Would you make a good pie?', '1132781134', 'fluorine.onspeed.com', 'you WHAT?! Heck no!');
INSERT INTO `chicken` VALUES(244, 'Should I stop asking you pointless questions?', '1132781171', 'fluorine.onspeed.com', 'nahhhhhh');
INSERT INTO `chicken` VALUES(245, 'Give me a Yes!', '1132781247', 'fluorine.onspeed.com', 'is the pope a catholic?');
INSERT INTO `chicken` VALUES(246, 'Give me a No!', '1132781253', 'fluorine.onspeed.com', 'why do you have to ask? yep!');
INSERT INTO `chicken` VALUES(435, 'thought you were plastic but?', '1141050682', 'pc022219.napier.ac.uk', 'er, no');
INSERT INTO `chicken` VALUES(248, 'Should we create you a side-kick?', '1132781319', 'fluorine.onspeed.com', 'Och aye');
INSERT INTO `chicken` VALUES(250, 'Is it your round?', '1132781524', 'fluorine.onspeed.com', 'Woop woop - affirmative alert');
INSERT INTO `chicken` VALUES(307, 'Have i been bad?', '1134090824', '80-44-112-112.dynamic.dsl.as9105.com', 'no, but buying me some rizlas may change that answer');
INSERT INTO `chicken` VALUES(252, 'How about vodka neat?', '1132781543', 'fluorine.onspeed.com', 'abraca-duh! You have to ask?');
INSERT INTO `chicken` VALUES(253, 'Would you like some \\"special cream\\" for that?', '1132781571', 'fluorine.onspeed.com', 'Yes indeed my feathered friend');
INSERT INTO `chicken` VALUES(254, 'Oi, chicken, show me the way to Amarillo', '1132834993', 'gateway-202.energis.gsi.gov.uk', 'Please insert another coin to continue (no)');
INSERT INTO `chicken` VALUES(255, 'Do you know the way to San Jose?', '1132835014', 'gateway-202.energis.gsi.gov.uk', 'pfft, yeah right');
INSERT INTO `chicken` VALUES(256, 'Is it true that 3 G&Ts and you\\''re anybody\\''s?', '1132835559', 'gateway-202.energis.gsi.gov.uk', 'Oh yessssss');
INSERT INTO `chicken` VALUES(257, 'Did you get your money for being an extra in Chicken Run?', '1132835729', 'gateway-202.energis.gsi.gov.uk', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(258, 'Are you funnier than jonny vegas?', '1133101593', '82-41-205-224.cable.ubr11.edin.blueyonder.co.uk', 'as my mother always used to say, no');
INSERT INTO `chicken` VALUES(259, 'Should we hire danny out to give massages?', '1133138566', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'er, no');
INSERT INTO `chicken` VALUES(261, 'Are you obssessed with rizlas?', '1133138596', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'nahhhhhh');
INSERT INTO `chicken` VALUES(508, 'When will I, will I be famous? Can you answer, can you answer that?', '1146573071', 'gateway-101.energis.gsi.gov.uk', 'the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)');
INSERT INTO `chicken` VALUES(263, 'Do Umpaloompas really exist?', '1133182378', 'pc043051.napier.ac.uk', 'Woop woop - affirmative alert');
INSERT INTO `chicken` VALUES(264, 'Will you ever run for public office?', '1133187618', 'gateway-202.energis.gsi.gov.uk', 'Woop woop - affirmative alert');
INSERT INTO `chicken` VALUES(265, 'Should Dave renew his subscription to the \\"Hannibal Lecter Eating Plan - fun for all the family\\"?', '1133265543', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'a big, fat, squeaky, NO!');
INSERT INTO `chicken` VALUES(266, 'Will you still need me, will you still feed me, when I\\''m 64?', '1133277677', 'gateway-202.energis.gsi.gov.uk', 'nahhhhhh');
INSERT INTO `chicken` VALUES(267, 'Does Van Morrison\\''s classic brown eyed girl have some deeply troubling undertones?', '1133307976', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'zzzzzZZZZZZ');
INSERT INTO `chicken` VALUES(429, 'Did Dave steal your prize bottle of Sunny D to have with his two dinners?', '1140777768', 'gateway-202.energis.gsi.gov.uk', 'of course!');
INSERT INTO `chicken` VALUES(270, 'kehrsueathw\\''oi', '1133392769', 'pc063186.napier.ac.uk', 'you WHAT?! Heck no!');
INSERT INTO `chicken` VALUES(272, 'do you like me?', '1133392832', 'pc063186.napier.ac.uk', 'Och aye');
INSERT INTO `chicken` VALUES(274, 'Are you the very model of a modern Major General?', '1133429512', 'gateway-202.energis.gsi.gov.uk', 'is the pope a catholic?');
INSERT INTO `chicken` VALUES(275, 'Was all this just fields when you were a lad?', '1133520319', 'gateway-202.energis.gsi.gov.uk', 'of course!');
INSERT INTO `chicken` VALUES(276, 'Have you ever casually knocked a penguin into the sea and pretended it wasn\\''t you?', '1133520470', 'gateway-202.energis.gsi.gov.uk', 'why of course');
INSERT INTO `chicken` VALUES(277, 'Is it true you rejected the lead role in Chicken Run 2 because you felt the film was \\"morally bankrupt\\"?', '1133520599', 'gateway-202.energis.gsi.gov.uk', 'of course!');
INSERT INTO `chicken` VALUES(280, 'Should I come back to live in Edinburgh next year?', '1133741927', 'host213-122-0-68.in-addr.btopenworld.com', 'Definitely!');
INSERT INTO `chicken` VALUES(281, 'Should I come back to study in Edinburgh next year?', '1133742060', 'host213-122-0-68.in-addr.btopenworld.com', 'huh? what? erm, yes, and leave me be');
INSERT INTO `chicken` VALUES(282, 'Can you sing a rainbow?', '1133786968', 'gateway-202.energis.gsi.gov.uk', 'There''s about as much chance of me saying yes as there is of me buying Chicken Tonight!');
INSERT INTO `chicken` VALUES(283, 'Are you the real Slim Shady?', '1133787129', 'gateway-202.energis.gsi.gov.uk', 'a big, fat, squeaky, NO!');
INSERT INTO `chicken` VALUES(284, 'will we pass our exams', '1133798207', 'pc014046.napier.ac.uk', 'don''t be daft, no way');
INSERT INTO `chicken` VALUES(285, 'Will Tech ever win his battle against C&IT?', '1133798245', 'pc014046.napier.ac.uk', 'you''re a smoothy, but alas, the answer''s no!');
INSERT INTO `chicken` VALUES(286, 'Chicken can you NAAAAAPPIIIEEEEEERRR?!', '1133875851', '146.176.236.28', 'why do you have to ask? yep!');
INSERT INTO `chicken` VALUES(290, 'Should Craig leapfrog other members of the club?', '1133891060', 'pc061126.napier.ac.uk', 'you WHAT?! Heck no!');
INSERT INTO `chicken` VALUES(291, 'Should the club have a wet T-shirt competition?', '1133891096', 'pc061126.napier.ac.uk', 'er, no');
INSERT INTO `chicken` VALUES(293, 'Do you feel like chicken tonight?', '1133891145', 'pc061126.napier.ac.uk', 'why of course');
INSERT INTO `chicken` VALUES(436, 'are you lying?', '1141050690', 'pc022219.napier.ac.uk', 'of course!');
INSERT INTO `chicken` VALUES(295, 'Is it cos I is Contraversial?', '1133891209', 'pc061126.napier.ac.uk', 'in the words of Bill Clinton, no!');
INSERT INTO `chicken` VALUES(296, 'Do you smell rubbery?', '1133891230', 'pc061126.napier.ac.uk', 'well duh!');
INSERT INTO `chicken` VALUES(297, 'Would you give me stomach ache if i ate you?', '1133891256', 'pc061126.napier.ac.uk', 'no!!!');
INSERT INTO `chicken` VALUES(298, 'Do you have any fettishes?', '1133891271', 'pc061126.napier.ac.uk', 'No way! Don''t touch me there either!');
INSERT INTO `chicken` VALUES(299, 'Shall I leave you be now?', '1133891384', 'pc061126.napier.ac.uk', 'yes!!!!!');
INSERT INTO `chicken` VALUES(300, 'Is plastic fantastic?', '1134033646', 'gateway-202.energis.gsi.gov.uk', 'of course!');
INSERT INTO `chicken` VALUES(301, 'Should Stewart grow a half man half monkey creation?', '1134043036', 'pc060057.napier.ac.uk', 'nahhhhhh');
INSERT INTO `chicken` VALUES(303, 'Are you in a very negative mood tonight?', '1134061101', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'yes!!!!!');
INSERT INTO `chicken` VALUES(305, 'Is Buster Keaton no match for Jerome in the world of physical comedy?', '1134070369', 'pc063109.napier.ac.uk', 'you''re a smoothy, but alas, the answer''s no!');
INSERT INTO `chicken` VALUES(310, 'Do you fancy Jerome?', '1134179737', '87.246.65.45', 'in the words of Shakespeare, ''Yes''');
INSERT INTO `chicken` VALUES(311, 'Do you fancy Ross?', '1134179778', '87.246.65.45', 'well duh!');
INSERT INTO `chicken` VALUES(314, 'is sunday the best day of the week?', '1134325761', '88-104-21-205.dynamic.dsl.as9105.com', 'abraca-duh! You have to ask?');
INSERT INTO `chicken` VALUES(315, 'will i ever win the lottery?', '1134325806', '88-104-21-205.dynamic.dsl.as9105.com', 'you''re a smoothy, but alas, the answer''s no!');
INSERT INTO `chicken` VALUES(322, 'Do you enjoy archery?', '1134647213', '146.176.171.201', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(318, 'Do you think about chicken nuggets sometimes?', '1134467602', '146.176.236.28', 'Indeedio');
INSERT INTO `chicken` VALUES(426, 'Have you ever laughed in the face of a magic 8-ball?', '1140702346', 'gateway-202.energis.gsi.gov.uk', 'of course!');
INSERT INTO `chicken` VALUES(427, 'Do you pity fools?', '1140702357', 'gateway-202.energis.gsi.gov.uk', 'of course!');
INSERT INTO `chicken` VALUES(326, 'is 42 the meaning of life?', '1134851325', 'webcacheB05a.cache.pol.co.uk', 'pfft, yeah right');
INSERT INTO `chicken` VALUES(327, 'Are google\\''s ads more targetted than stewart\\''s arrows?', '1135015873', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'Woop woop - affirmative alert');
INSERT INTO `chicken` VALUES(328, 'Can you hear it, coming in the air tonight?', '1135082800', 'gateway-202.energis.gsi.gov.uk', 'nahhhhhh');
INSERT INTO `chicken` VALUES(373, 'Are you a Norwegian blue?', '1135083150', 'gateway-202.energis.gsi.gov.uk', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(374, 'Garlic bread?', '1135083207', 'gateway-202.energis.gsi.gov.uk', 'er, no');
INSERT INTO `chicken` VALUES(375, 'Could you pass the salt?', '1135126829', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'a big, fat, squeaky, NO!');
INSERT INTO `chicken` VALUES(376, 'Are you just being deliberately rude?', '1135126839', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'nahhhhhh');
INSERT INTO `chicken` VALUES(377, 'Is it that special time of the month?', '1135126848', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'yes, but you have much to learn');
INSERT INTO `chicken` VALUES(379, 'Humbug?', '1135183075', 'gateway-202.energis.gsi.gov.uk', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(380, 'Did you have a good christmas?', '1135601934', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'Indeedio');
INSERT INTO `chicken` VALUES(381, 'do u like Haggins?', '1135637253', 'AFontenayssB-151-1-36-159.w82-121.abo.wanadoo.fr', 'Negative, soldier! Back to work!');
INSERT INTO `chicken` VALUES(382, 'are u sure u don\\''t like haggins?', '1135637332', 'AFontenayssB-151-1-36-159.w82-121.abo.wanadoo.fr', 'Please insert another coin to continue (no)');
INSERT INTO `chicken` VALUES(383, 'do you like haggis (say yes or i\\''ll pickle you!)', '1135730495', '87.246.64.96', 'Yes indeed my feathered friend');
INSERT INTO `chicken` VALUES(385, 'Is Exeter further away than the moon?', '1137093860', 'pc063015.napier.ac.uk', 'ye.. ye... yea.... no!');
INSERT INTO `chicken` VALUES(386, 'Were you the chicken that crossed the road?', '1137498376', '87.246.65.82', 'in the words of Shakespeare, ''Yes''');
INSERT INTO `chicken` VALUES(387, 'was it all just a game of chicken?', '1137498399', '87.246.65.82', 'well duh!');
INSERT INTO `chicken` VALUES(372, 'Are all your favourite questions laced with innuendo?', '1135082976', 'gateway-202.energis.gsi.gov.uk', 'No way! Don''t touch me there either!');
INSERT INTO `chicken` VALUES(390, 'Will Ross ever overcome his nemesis the Diary Page of Doom?', '1138301464', 'pc060198.napier.ac.uk', 'er, no');
INSERT INTO `chicken` VALUES(391, 'Am I doomed to die alone?', '1138968543', '82-41-219-82.cable.ubr13.edin.blueyonder.co.uk', 'of course!');
INSERT INTO `chicken` VALUES(440, 'The force is always with Jerome?', '1141774364', '87.246.65.66', 'er, no');
INSERT INTO `chicken` VALUES(405, 'Has anyone commented that you or some of your relatives look a bit like pineapples?', '1140092561', 'pc043050.napier.ac.uk', 'er, no');
INSERT INTO `chicken` VALUES(407, 'are you radioactive?', '1140092606', 'pc043050.napier.ac.uk', 'er, no');
INSERT INTO `chicken` VALUES(408, 'Do you always look that hungry?', '1140092621', 'pc043050.napier.ac.uk', 'of course!');
INSERT INTO `chicken` VALUES(409, 'Is it illegal to shoot hungry children with a bow', '1140092642', 'pc043050.napier.ac.uk', 'of course!');
INSERT INTO `chicken` VALUES(423, 'has your reign as the next best thing to a magic eight ball come to an end?', '1140655981', '87.246.65.82', 'er, no');
INSERT INTO `chicken` VALUES(425, 'Do you want to be in my gang, my gang, my gang?', '1140702313', 'gateway-202.energis.gsi.gov.uk', 'of course!');
INSERT INTO `chicken` VALUES(461, 'are you in fact an ostrich in disguise?', '1142301935', 'haggis.cache.ed.ac.uk', 'in the words of Shakespeare, ''Yes''');
INSERT INTO `chicken` VALUES(417, 'perhaps some time doing night classes on English vocab might give you a more witty edge?', '1140092796', 'pc043050.napier.ac.uk', 'er, no');
INSERT INTO `chicken` VALUES(506, 'Are you a cheeky wind-up scampeteer?', '1146058750', 'gateway-101.energis.gsi.gov.uk', 'nahhhhhh');
INSERT INTO `chicken` VALUES(445, 'Is Napier Uni a good Uni?', '1141835058', '146.176.236.31', 'er, no');
INSERT INTO `chicken` VALUES(446, 'Does the Chicken have Bird Flu?', '1141835079', '146.176.236.31', 'of course!');
INSERT INTO `chicken` VALUES(447, 'Is Jerome mad?', '1141835109', '146.176.236.31', 'er, no');
INSERT INTO `chicken` VALUES(449, 'Does the Chicken have Bird Flu?', '1141835216', '146.176.236.31', 'of course!');
INSERT INTO `chicken` VALUES(450, 'Is anybody going to post BUSA pictures?????', '1141860782', 'pcw1992.see.ed.ac.uk', 'er, no');
INSERT INTO `chicken` VALUES(452, 'Should we all go to BUTC?', '1141925493', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'of course!');
INSERT INTO `chicken` VALUES(509, 'Do I need to be green to be loved?', '1146683844', 'host-84-9-158-185.bulldogdsl.com', 'No way! Don''t touch me there either!');
INSERT INTO `chicken` VALUES(456, 'Is that better?', '1141926008', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'according to my handbook, the answer''s yes!');
INSERT INTO `chicken` VALUES(459, 'Do you suck?', '1141926107', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'Woop woop - affirmative alert');
INSERT INTO `chicken` VALUES(460, 'Will you ever be extended so that you can answer questions that aren\\''t simple yes/no answers?', '1141926159', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'Pah, chickenfeed!');
INSERT INTO `chicken` VALUES(463, 'Do you know the way to san Jose?', '1142356851', 'pcw1992.see.ed.ac.uk', 'Pah, chickenfeed!');
INSERT INTO `chicken` VALUES(464, 'Does Jerome\\''s chair trick turn out to be less impressive than the build up?', '1142392112', '87.246.65.31', 'Oh yessssss');
INSERT INTO `chicken` VALUES(489, 'Does Big Ian Drink too much?', '1144323304', 'host81-156-25-0.range81-156.btcentralplus.com', 'the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)');
INSERT INTO `chicken` VALUES(480, 'Will you get down and boogy and play that funky music til you die?', '1143121562', 'gateway-101.energis.gsi.gov.uk', 'no but');
INSERT INTO `chicken` VALUES(481, 'Will you be running for Club President?', '1143194829', 'gateway-101.energis.gsi.gov.uk', 'zzzzzZZZZZZ');
INSERT INTO `chicken` VALUES(487, 'Do you regard oneself as king of the zombies?', '1143882631', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'in the words of Bill Clinton, no!');
INSERT INTO `chicken` VALUES(488, 'I bet that you look good on the dancefloor. Do you?', '1144232652', 'gateway-101.energis.gsi.gov.uk', 'zzzzzZZZZZZZ');
INSERT INTO `chicken` VALUES(513, 'do you like chocolate eggs', '1146746719', 'nclewomensaid.plus.com', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(475, 'so you don\\''t know the answer?', '1143063034', '82-41-231-118.cable.ubr08.edin.blueyonder.co.uk', 'Please insert another coin to continue (no)');
INSERT INTO `chicken` VALUES(517, 'are my abnormal toes really princess toes', '1146773229', 'host86-142-234-33.range86-142.btcentralplus.com', 'no but');
INSERT INTO `chicken` VALUES(516, 'shall I go clothes shopping tomorrow?', '1146753250', 'school-filter3.hants.gov.uk', 'Yes, that''s what happens when you fight a guy in the alps...');
INSERT INTO `chicken` VALUES(478, 'wanna fight about it?', '1143063124', '82-41-231-118.cable.ubr08.edin.blueyonder.co.uk', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(485, 'Am I completely doomed to failure?', '1143791853', '200-80-19-212-dfort-t1-z3.wireless.as15758.net', 'There''s about as much chance of me saying yes as there is of me buying Chicken Tonight!');
INSERT INTO `chicken` VALUES(484, 'Do you want a Cornetto from the shop?', '1143628247', 'gateway-101.energis.gsi.gov.uk', 'nahhhhhh');
INSERT INTO `chicken` VALUES(492, 'Do you have aching giblets?', '1144490555', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'No way! Don''t touch me there either!');
INSERT INTO `chicken` VALUES(493, 'Sore gizzard?', '1144490580', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)');
INSERT INTO `chicken` VALUES(494, 'Runny beak?', '1144490584', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'the flowers are flowering, the bees are buzzing, and it is a good day for an affirmative! (yes!)');
INSERT INTO `chicken` VALUES(495, 'Have you tried new Hensip Max for bird flu?', '1144490608', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'as my mother always used to say, no');
INSERT INTO `chicken` VALUES(496, 'do you like mules', '1144512235', 'host86-130-23-205.range86-130.btcentralplus.com', 'I think not baby puppy');
INSERT INTO `chicken` VALUES(497, 'Do you have a nemesis known only as \\"Le Poulet\\"', '1144665632', 'gateway-101.energis.gsi.gov.uk', 'no, but buying me some rizlas may change that answer');
INSERT INTO `chicken` VALUES(498, 'am i gonna be rich?', '1144718993', '81-86-35-185.dsl.pipex.com', 'no, but buying me some rizlas may change that answer');
INSERT INTO `chicken` VALUES(499, 'Does jerome talk total crap?', '1144753288', '80-192-9-252.cable.ubr11.edin.blueyonder.co.uk', 'yeah baby yeah!');
INSERT INTO `chicken` VALUES(501, 'Does Nemesis have the force?', '1144785076', '87.246.65.66', 'not for you, not for anyone!');
INSERT INTO `chicken` VALUES(502, 'are my bows lost?', '1144928015', '87.246.65.66', 'no but');
INSERT INTO `chicken` VALUES(503, 'Does Stewart have a homeless bow?', '1144928135', '87.246.65.66', 'why do you have to ask? yep!');
INSERT INTO `chicken` VALUES(519, 'will we win the world cup?', '1146855991', '73.177.187.81.in-addr.arpa', 'not for you, not for anyone!');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--
-- in use(#145 - Table './napierarchery_org_uk_-_db/counter' is marked as crashed and should be repaired)

--
-- Dumping data for table `counter`
--
-- in use (#145 - Table './napierarchery_org_uk_-_db/counter' is marked as crashed and should be repaired)

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `diaryid` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `place` text NOT NULL,
  `event_unixtime` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`diaryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=189 ;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` VALUES(188, 'Club AGM', 'Apex Cafe, Merchiston', 1209063600);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `galleryid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `timestamp` varchar(50) NOT NULL DEFAULT '',
  `indexImage` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`galleryid`),
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` VALUES(1, 'Practice Session at QMUC', 'Practice session on 11/Apr/2005 at Queen Maragaret\\''s', '1132878743', 1);
INSERT INTO `galleries` VALUES(2, 'Practice Session at Heriot Watt', 'Practice session at Heriot Watt on 07/Jul/2005', '1132879136', 6);
INSERT INTO `galleries` VALUES(3, 'Freshers\\'' Fayre', 'Freshers\\'' Fayre 2005', '1132879376', 12);
INSERT INTO `galleries` VALUES(4, 'Practice session at QMUC #2', '17/Oct/2005 Practice session at QMUC', '1132879625', 13);
INSERT INTO `galleries` VALUES(5, 'SUS League Match, Edinburgh Uni, 26-11-2005', 'The crazy crew, fronted by Stewart, Big Ian and Ross in descending order of apparent size! Taken at Edinburgh University Sports Centre before the start of the league match', '1133395991', 39);
INSERT INTO `galleries` VALUES(6, 'The Sublime to the Ridiculous', 'Random pictures of... well... random things.... with not so random people!', '1134061995', 45);
INSERT INTO `galleries` VALUES(7, 'BUSA Indoors 2006, Exeter', 'Snaps of shenanigans in Exeter, en route and otherwise!', '1141919969', 55);
INSERT INTO `galleries` VALUES(8, 'Outdoor Training Heriot Watt  23/April/2007', 'Outdoor Training Heriot Watt  23/April/2007', '1177522703', 128);
INSERT INTO `galleries` VALUES(9, 'SUS Outdoors 2007', 'SUS Outdoors held in St Andrews, 5th May 2007. As photographed by Stewart Barclay.', '1178806262', 153);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `imageid` bigint(20) NOT NULL AUTO_INCREMENT,
  `timestamp` varchar(50) NOT NULL DEFAULT '',
  `galleryid` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`imageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` VALUES(1, '1132878743', 1);
INSERT INTO `gallery_images` VALUES(2, '1132878761', 1);
INSERT INTO `gallery_images` VALUES(3, '1132878766', 1);
INSERT INTO `gallery_images` VALUES(4, '1132878773', 1);
INSERT INTO `gallery_images` VALUES(6, '1132879136', 2);
INSERT INTO `gallery_images` VALUES(7, '1132879154', 2);
INSERT INTO `gallery_images` VALUES(8, '1132879161', 2);
INSERT INTO `gallery_images` VALUES(9, '1132879170', 2);
INSERT INTO `gallery_images` VALUES(10, '1132879177', 2);
INSERT INTO `gallery_images` VALUES(11, '1132879184', 2);
INSERT INTO `gallery_images` VALUES(12, '1132879376', 3);
INSERT INTO `gallery_images` VALUES(13, '1132879625', 4);
INSERT INTO `gallery_images` VALUES(14, '1132879642', 4);
INSERT INTO `gallery_images` VALUES(15, '1132879648', 4);
INSERT INTO `gallery_images` VALUES(16, '1132879653', 4);
INSERT INTO `gallery_images` VALUES(17, '1132879659', 4);
INSERT INTO `gallery_images` VALUES(18, '1132879663', 4);
INSERT INTO `gallery_images` VALUES(19, '1132879699', 4);
INSERT INTO `gallery_images` VALUES(20, '1132879704', 4);
INSERT INTO `gallery_images` VALUES(21, '1132879710', 4);
INSERT INTO `gallery_images` VALUES(22, '1132879716', 4);
INSERT INTO `gallery_images` VALUES(23, '1132879721', 4);
INSERT INTO `gallery_images` VALUES(24, '1132879726', 4);
INSERT INTO `gallery_images` VALUES(25, '1132879731', 4);
INSERT INTO `gallery_images` VALUES(26, '1132879736', 4);
INSERT INTO `gallery_images` VALUES(27, '1132879741', 4);
INSERT INTO `gallery_images` VALUES(28, '1132879746', 4);
INSERT INTO `gallery_images` VALUES(29, '1132879751', 4);
INSERT INTO `gallery_images` VALUES(30, '1132879756', 4);
INSERT INTO `gallery_images` VALUES(31, '1132879761', 4);
INSERT INTO `gallery_images` VALUES(32, '1132879766', 4);
INSERT INTO `gallery_images` VALUES(33, '1132879770', 4);
INSERT INTO `gallery_images` VALUES(42, '1133396308', 5);
INSERT INTO `gallery_images` VALUES(41, '1133396262', 5);
INSERT INTO `gallery_images` VALUES(36, '1132879790', 4);
INSERT INTO `gallery_images` VALUES(39, '1133395991', 5);
INSERT INTO `gallery_images` VALUES(43, '1133396348', 5);
INSERT INTO `gallery_images` VALUES(44, '1133915104', 4);
INSERT INTO `gallery_images` VALUES(45, '1134061995', 6);
INSERT INTO `gallery_images` VALUES(46, '1134062039', 6);
INSERT INTO `gallery_images` VALUES(47, '1134062048', 6);
INSERT INTO `gallery_images` VALUES(48, '1134062056', 6);
INSERT INTO `gallery_images` VALUES(49, '1134062069', 6);
INSERT INTO `gallery_images` VALUES(50, '1134078999', 6);
INSERT INTO `gallery_images` VALUES(51, '1135128337', 6);
INSERT INTO `gallery_images` VALUES(52, '1135128477', 6);
INSERT INTO `gallery_images` VALUES(53, '1135129512', 6);
INSERT INTO `gallery_images` VALUES(54, '1135129526', 6);
INSERT INTO `gallery_images` VALUES(55, '1141919968', 7);
INSERT INTO `gallery_images` VALUES(56, '1141920034', 7);
INSERT INTO `gallery_images` VALUES(57, '1141920042', 7);
INSERT INTO `gallery_images` VALUES(58, '1141920052', 7);
INSERT INTO `gallery_images` VALUES(59, '1141920059', 7);
INSERT INTO `gallery_images` VALUES(60, '1141920067', 7);
INSERT INTO `gallery_images` VALUES(61, '1141920075', 7);
INSERT INTO `gallery_images` VALUES(62, '1141920081', 7);
INSERT INTO `gallery_images` VALUES(63, '1141920135', 7);
INSERT INTO `gallery_images` VALUES(64, '1141920150', 7);
INSERT INTO `gallery_images` VALUES(72, '1141920431', 7);
INSERT INTO `gallery_images` VALUES(66, '1141920177', 7);
INSERT INTO `gallery_images` VALUES(71, '1141920421', 7);
INSERT INTO `gallery_images` VALUES(68, '1141920196', 7);
INSERT INTO `gallery_images` VALUES(69, '1141920207', 7);
INSERT INTO `gallery_images` VALUES(70, '1141920215', 7);
INSERT INTO `gallery_images` VALUES(73, '1141920443', 7);
INSERT INTO `gallery_images` VALUES(74, '1141920451', 7);
INSERT INTO `gallery_images` VALUES(76, '1141920506', 7);
INSERT INTO `gallery_images` VALUES(77, '1141920515', 7);
INSERT INTO `gallery_images` VALUES(78, '1141920527', 7);
INSERT INTO `gallery_images` VALUES(79, '1141920536', 7);
INSERT INTO `gallery_images` VALUES(80, '1141920544', 7);
INSERT INTO `gallery_images` VALUES(81, '1141920556', 7);
INSERT INTO `gallery_images` VALUES(82, '1141920566', 7);
INSERT INTO `gallery_images` VALUES(83, '1141920574', 7);
INSERT INTO `gallery_images` VALUES(84, '1141920583', 7);
INSERT INTO `gallery_images` VALUES(85, '1141920593', 7);
INSERT INTO `gallery_images` VALUES(86, '1141920601', 7);
INSERT INTO `gallery_images` VALUES(87, '1141920609', 7);
INSERT INTO `gallery_images` VALUES(88, '1141920618', 7);
INSERT INTO `gallery_images` VALUES(89, '1141920632', 7);
INSERT INTO `gallery_images` VALUES(90, '1141920689', 7);
INSERT INTO `gallery_images` VALUES(91, '1141920698', 7);
INSERT INTO `gallery_images` VALUES(113, '1141921186', 7);
INSERT INTO `gallery_images` VALUES(93, '1141920719', 7);
INSERT INTO `gallery_images` VALUES(94, '1141920727', 7);
INSERT INTO `gallery_images` VALUES(95, '1141920736', 7);
INSERT INTO `gallery_images` VALUES(96, '1141920745', 7);
INSERT INTO `gallery_images` VALUES(97, '1141920757', 7);
INSERT INTO `gallery_images` VALUES(98, '1141920775', 7);
INSERT INTO `gallery_images` VALUES(99, '1141920789', 7);
INSERT INTO `gallery_images` VALUES(100, '1141920800', 7);
INSERT INTO `gallery_images` VALUES(101, '1141920929', 7);
INSERT INTO `gallery_images` VALUES(102, '1141920936', 7);
INSERT INTO `gallery_images` VALUES(103, '1141920943', 7);
INSERT INTO `gallery_images` VALUES(104, '1141920951', 7);
INSERT INTO `gallery_images` VALUES(105, '1141920960', 7);
INSERT INTO `gallery_images` VALUES(106, '1141920967', 7);
INSERT INTO `gallery_images` VALUES(108, '1141921032', 7);
INSERT INTO `gallery_images` VALUES(109, '1141921052', 7);
INSERT INTO `gallery_images` VALUES(110, '1141921061', 7);
INSERT INTO `gallery_images` VALUES(111, '1141921071', 7);
INSERT INTO `gallery_images` VALUES(112, '1141921102', 7);
INSERT INTO `gallery_images` VALUES(114, '1141921195', 7);
INSERT INTO `gallery_images` VALUES(115, '1141921203', 7);
INSERT INTO `gallery_images` VALUES(116, '1141921213', 7);
INSERT INTO `gallery_images` VALUES(117, '1141921222', 7);
INSERT INTO `gallery_images` VALUES(118, '1141921232', 7);
INSERT INTO `gallery_images` VALUES(119, '1141921244', 7);
INSERT INTO `gallery_images` VALUES(120, '1141921254', 7);
INSERT INTO `gallery_images` VALUES(121, '1141921268', 7);
INSERT INTO `gallery_images` VALUES(122, '1141921314', 7);
INSERT INTO `gallery_images` VALUES(123, '1141921321', 7);
INSERT INTO `gallery_images` VALUES(124, '1141921329', 7);
INSERT INTO `gallery_images` VALUES(125, '1141921336', 7);
INSERT INTO `gallery_images` VALUES(126, '1141921343', 7);
INSERT INTO `gallery_images` VALUES(127, '1141921351', 7);
INSERT INTO `gallery_images` VALUES(128, '1177522703', 8);
INSERT INTO `gallery_images` VALUES(129, '1177522819', 8);
INSERT INTO `gallery_images` VALUES(130, '1177522851', 8);
INSERT INTO `gallery_images` VALUES(131, '1177522874', 8);
INSERT INTO `gallery_images` VALUES(132, '1177522899', 8);
INSERT INTO `gallery_images` VALUES(133, '1177522909', 8);
INSERT INTO `gallery_images` VALUES(134, '1177522944', 8);
INSERT INTO `gallery_images` VALUES(135, '1177522965', 8);
INSERT INTO `gallery_images` VALUES(136, '1177522979', 8);
INSERT INTO `gallery_images` VALUES(137, '1177523005', 8);
INSERT INTO `gallery_images` VALUES(138, '1177523072', 8);
INSERT INTO `gallery_images` VALUES(139, '1177523111', 8);
INSERT INTO `gallery_images` VALUES(140, '1177523156', 8);
INSERT INTO `gallery_images` VALUES(141, '1177523193', 8);
INSERT INTO `gallery_images` VALUES(142, '1177523251', 8);
INSERT INTO `gallery_images` VALUES(143, '1177523324', 8);
INSERT INTO `gallery_images` VALUES(144, '1177523399', 8);
INSERT INTO `gallery_images` VALUES(145, '1177523479', 8);
INSERT INTO `gallery_images` VALUES(146, '1177523531', 8);
INSERT INTO `gallery_images` VALUES(147, '1177523560', 8);
INSERT INTO `gallery_images` VALUES(148, '1177523628', 8);
INSERT INTO `gallery_images` VALUES(149, '1177523714', 8);
INSERT INTO `gallery_images` VALUES(150, '1177523762', 8);
INSERT INTO `gallery_images` VALUES(151, '1177523795', 8);
INSERT INTO `gallery_images` VALUES(152, '1177524772', 8);
INSERT INTO `gallery_images` VALUES(153, '1178806262', 9);
INSERT INTO `gallery_images` VALUES(154, '1178808085', 9);
INSERT INTO `gallery_images` VALUES(155, '1178808091', 9);
INSERT INTO `gallery_images` VALUES(156, '1178808098', 9);
INSERT INTO `gallery_images` VALUES(157, '1178808103', 9);
INSERT INTO `gallery_images` VALUES(158, '1178808109', 9);
INSERT INTO `gallery_images` VALUES(159, '1178808114', 9);
INSERT INTO `gallery_images` VALUES(160, '1178808119', 9);
INSERT INTO `gallery_images` VALUES(161, '1178808125', 9);
INSERT INTO `gallery_images` VALUES(162, '1178808152', 9);
INSERT INTO `gallery_images` VALUES(163, '1178808158', 9);
INSERT INTO `gallery_images` VALUES(164, '1178808163', 9);
INSERT INTO `gallery_images` VALUES(165, '1178808168', 9);
INSERT INTO `gallery_images` VALUES(166, '1178808176', 9);
INSERT INTO `gallery_images` VALUES(167, '1178808183', 9);
INSERT INTO `gallery_images` VALUES(168, '1178808191', 9);
INSERT INTO `gallery_images` VALUES(169, '1178808196', 9);
INSERT INTO `gallery_images` VALUES(170, '1178808201', 9);
INSERT INTO `gallery_images` VALUES(171, '1178808206', 9);
INSERT INTO `gallery_images` VALUES(172, '1178808210', 9);
INSERT INTO `gallery_images` VALUES(173, '1178808215', 9);
INSERT INTO `gallery_images` VALUES(174, '1178808220', 9);
INSERT INTO `gallery_images` VALUES(175, '1178808225', 9);
INSERT INTO `gallery_images` VALUES(176, '1178808229', 9);
INSERT INTO `gallery_images` VALUES(177, '1178808234', 9);
INSERT INTO `gallery_images` VALUES(178, '1178808240', 9);
INSERT INTO `gallery_images` VALUES(179, '1178808245', 9);
INSERT INTO `gallery_images` VALUES(180, '1178808250', 9);
INSERT INTO `gallery_images` VALUES(181, '1178808255', 9);
INSERT INTO `gallery_images` VALUES(182, '1178808260', 9);
INSERT INTO `gallery_images` VALUES(183, '1178808266', 9);
INSERT INTO `gallery_images` VALUES(184, '1178808271', 9);
INSERT INTO `gallery_images` VALUES(185, '1178808276', 9);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberid` bigint(50) NOT NULL AUTO_INCREMENT,
  `course` varchar(225) NOT NULL DEFAULT '',
  `style` varchar(225) NOT NULL DEFAULT '',
  `position` varchar(225) NOT NULL DEFAULT '',
  `equipment` varchar(225) NOT NULL DEFAULT '',
  `bests` varchar(225) NOT NULL DEFAULT '',
  `quote_` varchar(225) NOT NULL DEFAULT '',
  `name` varchar(225) NOT NULL DEFAULT '',
  `email` varchar(225) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`memberid`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` VALUES(44, 'BEng (Hons) Computing', 'Gents Rec/BB/Compound Experienced (RH)', 'Webmaster', 'Recurve: W&W Winstar + Easton X7s + A/C/C 830\\''s Compound : Hoyt Ultrasport + Cartel Olympian 900 \\''s + Easton Jazz 1618 Lite\\''s', 'Portsmouth 289 (BB) / Portsmouth 444 (Rec Non Competitive) / 530 Compound', '', 'Craig Atkin', '02003147@napier.ac.uk', '07828214566');
INSERT INTO `members` VALUES(45, 'BA Business Management', 'Recurve (LH)', 'Novice Member', 'Club Equipment', 'Portsmouth 491', '', 'Stefan Drasdo', '06010621@napier.ac.uk', '07942244119');
INSERT INTO `members` VALUES(37, '-----', 'From the hip, and rarely. Recurve (RH)', 'Coach & Alumni Member', 'Hoyt Radian, Gemini stabilisers, Shibuya sight, Cartel 800\\''s', 'Portsmouth 521 (not at Napier), Albion 749 (not at Napier)', '', 'Stewart Barclay', 'sjmbarclay@yahoo.co.uk', '07929873016');
INSERT INTO `members` VALUES(38, 'BA (Hons) Psychology', 'Recurve (RH)', 'Secretary', 'Hoyt Eclipse, Challenger Limbs & Easton A\\\\C\\\\C arrows', 'Portsmouth 445', '', 'Anna Basista', '06014706@napier.ac.uk', '07856844189');
INSERT INTO `members` VALUES(39, '---', 'Recurve (RH)', 'Alumni Member', 'A one piece bow. Eek.', 'Portsmouth 505', '', 'Alastair MacDonald', 'macian92@hotmail.com', '07920462047');
INSERT INTO `members` VALUES(40, '', 'Recurve (RH)', 'Novice Member', 'Club Equipment', 'Portsmouth 426', '', 'Andrew Pate', '', '');
INSERT INTO `members` VALUES(41, 'BSc Transport Management', 'Recurve (RH)', 'Senior Member', '', 'Portsmouth 473', '', 'Irina Pasin', '', '');
INSERT INTO `members` VALUES(42, 'BA (Hons) Electronic & Computer Engineering', 'Recurve (RH)', 'President', 'W&W Winstar + Easton A\\\\C\\\\C arrows', 'Portsmouth 514', '', 'Piotr Wojtczuk', '05005491@napier.ac.uk', '07891067314');
INSERT INTO `members` VALUES(43, 'BSc (Hons) Quantity Surveying', 'Recurve (RH)', 'Senior member', '', 'Portsmouth 415', '', 'Rachel Gallinagh', '', '');
INSERT INTO `members` VALUES(46, 'Animal Biology', 'Recurve (RH)', 'Novice Member', 'Club Equipment', 'Portsmouth 283', '', 'David Lynch', '0600152@napier.ac.uk', '07903094944');
INSERT INTO `members` VALUES(47, 'Animal Biology', 'Recurve (LH)', 'Novice Member', 'Club Equipment', '', '', 'Christine MacKay', '06002273@napier.ac.uk', '07837181228');
INSERT INTO `members` VALUES(48, 'Psychology', 'Recurve (RH)', 'Social Secretary', 'Club equipment', 'Portsmouth 452', '', 'Joanna Wincenciak', '06005353@napier.ac.uk', '07776201378');
INSERT INTO `members` VALUES(49, 'Accounting and Marketing Management', 'Recurve (RH)', 'Treasurer', 'Club Equipment', 'Porstmouth 281', '', 'Lydia Herrod-Taylor', '06015076@napier.ac.uk', '07749446244');
INSERT INTO `members` VALUES(50, 'Financial Services', 'Recurve (RH)', 'Novice Member', 'Club Equipment', 'Portsmouth 420', '', 'Sergii Chmyrenko', '', '');
INSERT INTO `members` VALUES(51, 'BA Business Management', 'Recurve (RH)', 'Novice Member', 'Club Equipment', 'Portsmouth 398', '', 'Sergii Semenov', '', '');
INSERT INTO `members` VALUES(52, 'BEng Software Engineering', 'Brute force and ignorance. Gents Rec/Comp Experienced (RH)', 'Committee Member', 'Alternative Compound; Hoyt TD4 + GM limbs; Various ACE\\''s and X7\\''s', 'Recurve - Portsmouth 561 (not at Napier), FITA 1 526 (not at Napier)', '', 'Ian Richardson', '', '');
INSERT INTO `members` VALUES(53, 'Accounting', 'Recurve (RH)', 'Novice Member', 'Club Equipment', '', '', 'David Timms', '', '');
INSERT INTO `members` VALUES(54, 'Biomedical Sciences', 'Recurve (RH)', 'Novice Member', 'Club Equipment', '', '', 'Sarah Henderson', '', '');
INSERT INTO `members` VALUES(55, '---', 'Recurve (RH)', 'Club Coach', '', '', '', 'David Lange', '', '');
INSERT INTO `members` VALUES(56, 'Herbal Medicine', 'Recurve (RH)', 'Senior member', '', 'Portsmouth 488 (at Napier)', '', 'Yvonne Bowman', '03009112@napier.ac.uk', '07793026856');
INSERT INTO `members` VALUES(57, 'Architectural Technology (BSC Hnrs)', 'Recurve (RH)', 'Website and Publicity (No. One!!)', '', '518', '', 'Matt Hull', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `members04`
--

CREATE TABLE `members04` (
  `memberid` bigint(20) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL DEFAULT '',
  `style` varchar(255) NOT NULL DEFAULT '',
  `position` varchar(255) NOT NULL DEFAULT '',
  `equipment` varchar(255) NOT NULL DEFAULT '',
  `bests` varchar(255) NOT NULL DEFAULT '',
  `quotes_04` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`memberid`),
  FULLTEXT KEY `course` (`course`,`style`,`position`,`equipment`,`bests`,`quotes_04`,`name`,`email`,`mobile`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `members04`
--

INSERT INTO `members04` VALUES(70, 'BEng (Hons) Computing', 'Barebow & Recurve (RH)', 'Novice Member', 'Win & Win Winstar + Club Arrows', '', '', 'Craig Atkin', '02003147@napier.ac.uk', '07828214566');
INSERT INTO `members04` VALUES(71, '', 'Recurve', 'Novice Member', 'Club Equipment', '', '', 'Barrie Cunning', '', '');
INSERT INTO `members04` VALUES(72, 'Herbal Medicine', 'Recurve (RH)', 'Novice Member', 'Club Equipment', '', '', 'Danny Hignett', '', '');
INSERT INTO `members04` VALUES(73, '', 'Recurve', 'Novice Member', 'Club Equipment', '', '', 'David Rowell', '', '');
INSERT INTO `members04` VALUES(74, '', 'Recurve (RH)', 'Novice Member', 'Club Equipment', '', '', 'Drew McNaughton', '', '');
INSERT INTO `members04` VALUES(75, '', 'Recurve', 'Novice Member', 'Club Equipment', '', '', 'Jamie Kelly', '', '');
INSERT INTO `members04` VALUES(76, '', 'Recurve', 'Novice Member', 'Club Equipment', '', '', 'John Aithie', '', '');
INSERT INTO `members04` VALUES(77, '', 'Recurve', 'Secretary', 'Club Equipment', '', '', 'Marie Naesheim', '', '');
INSERT INTO `members04` VALUES(78, 'MSc Drug Design', 'Recurve (LH)', 'Novice Member', 'Club Equipment', '', '', 'Naomi Thompson', '', '');
INSERT INTO `members04` VALUES(79, '', 'Recurve (RH) Novice', 'President', 'Win & Win Winact', '', '', 'Phil Roberts', '', '');
INSERT INTO `members04` VALUES(80, '', 'Recurve', 'Novice Member', 'Club Equipment', '', '', 'Richard Hamilton', '', '');
INSERT INTO `members04` VALUES(81, 'MSc Software Technology for the Web', 'Recurve (RH)', 'Ordinary Member', 'Spigarelli Item + Border XP10 limbs. Olympian arrows', 'Portsmouth 542 (at Napier), Albion 796 (at Napier)', '', 'Richard Nicol', '', '');
INSERT INTO `members04` VALUES(82, 'MSc Software Engineering', 'Recurve (RH)', 'Ordinary Member', 'Hoyt Radian, Gemini stabilisers, Shibuya sight, Cartel 800''s', 'Portsmouth 521 (not at Napier), Albion 749 (not at Napier)', '', 'Stewart Barclay', '', '');
INSERT INTO `members04` VALUES(83, '', 'Recurve (RH)', 'Treasurer', 'Club Equipment', '', '', 'Tony Farrow', '', '');
INSERT INTO `members04` VALUES(84, 'Herbal Medicine', 'Recurve', 'Member', '', '', '', 'Yvonne Bowman', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `members05`
--

CREATE TABLE `members05` (
  `memberid` bigint(20) NOT NULL AUTO_INCREMENT,
  `course` varchar(225) NOT NULL DEFAULT '',
  `style` varchar(225) NOT NULL DEFAULT '',
  `position` varchar(225) NOT NULL DEFAULT '',
  `equipment` varchar(225) NOT NULL DEFAULT '',
  `bests` varchar(225) NOT NULL DEFAULT '',
  `quote_` varchar(225) NOT NULL DEFAULT '',
  `name` varchar(225) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`memberid`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `members05`
--

INSERT INTO `members05` VALUES(1, 'Some PhD or another', 'Gents Recurve Novice (RH)', 'Website Manager', 'SF Archery Riser, Easton A/C/C 620s and XX75s', 'Portsmouth 530', 'It came to me in a dream.', 'Ross Cranford', 'rosscranford@gmail.com', '07851221083');
INSERT INTO `members05` VALUES(4, 'BEng (Hons) Computing', 'Gents Rec/BB Experienced (RH)', 'President', 'Recurve: W&W Winstar + Easton X7s + A/C/C 830\\''s Compound : Hoyt Ultrasport + Cartel Olympian 900 \\''s + Easton Jazz 1618 Lite\\''s', 'Portsmouth 289 (BB) / Portsmouth 444 (Non Competitive)', 'Are you saying you\\''d prefer to sit on my long rod?!?', 'Craig Atkin', '02003147@napier.ac.uk', '07828214566');
INSERT INTO `members05` VALUES(5, 'Polymer Engineering', 'Ladies Recurve Experienced (RH)', 'Member', 'Hoyt Matrix', 'Portsmouth 528', '', 'Delphine Aimard', '05002607@napier.ac.uk', '07890775710');
INSERT INTO `members05` VALUES(6, 'Herbal Medicine', 'Gents Recurve Experienced (RH)', 'Member', 'Club equipment', 'Portsmouth 442', 'Can you still see it if you close both eyes?', 'Drew McNaughton', '02010164@napier.ac.uk', '07730516106');
INSERT INTO `members05` VALUES(7, 'Psychology', 'Gents Recurve Novice (RH)', 'Member', 'Club equipment', '', 'I don''t mind paying for it, I just can''t be bothered getting it up', 'George Cort', '05003337@napier.ac.uk', '07905812176');
INSERT INTO `members05` VALUES(8, 'Civil and Timber Engineering', 'Gents Recurve Experienced (RH)', 'Member', 'Club equipment', 'Portsmouth 247', 'Where\\''s my medal?', 'Iain Caley', '02003605@napier.ac.uk', '07792764082');
INSERT INTO `members05` VALUES(9, 'Transport Management', 'Ladies Recurve Novice (RH)', 'Member', '', 'Portsmouth 460', '', 'Irina Pasin', '05003588@napier.ac.uk', '07704637029');
INSERT INTO `members05` VALUES(10, 'Drug Design (MSc.)', 'Ladies Recurve Experienced (LH)', 'Member', 'Club equipment', 'Portsmouth 218, Windsor 298', '', 'Naomi Thompson', 'ndthompson@gmail.com', '07779105625');
INSERT INTO `members05` VALUES(11, 'Electronic and Electrical Engineering', 'Gents Recurve Novice (RH)', 'Member', 'W&W Winstar + Easton Redlines', 'Portsmouth 497', '', 'Piotr Wojtczuk', '05005491@napier.ac.uk', '07891067314');
INSERT INTO `members05` VALUES(12, 'Software Technology for the Web (MSc.)', 'Gents Recurve Experienced (RH)', 'Member', 'Spigarelli Item + Border XP10 limbs. Olympian arrows.', 'Portsmouth 542 (at Napier), Albion 796 (at Napier)', 'There\\''s no oil... where\\''s the oil?', 'Richard Nicol', 'richard_nicol@slikweb.plus.com', '07811829807');
INSERT INTO `members05` VALUES(13, 'Software Engineering (MSc.)', 'Gents Recurve Experienced (RH)', 'Member', 'Hoyt Radian, Gemini stabilisers, Shibuya sight, Cartel 800\\''s.', 'Portsmouth 521 (not at Napier), Albion 749 (not at Napier)', 'What an excellent piece of strange!', 'Stewart Barclay', 'sjmbarclay@yahoo.co.uk', '07929873016');
INSERT INTO `members05` VALUES(14, 'Herbal Medicine', 'Ladies Recurve Experienced (RH)', 'Secretary, also Child Protection Officer', '', 'Portsmouth 485 (at Napier)', 'It\\''s called the menopause, by the way', 'Yvonne Bowman', '03009112@napier.ac.uk', '07793026856');
INSERT INTO `members05` VALUES(15, 'Herbal Medicine', 'Gents Recurve Experienced (RH)', 'Treasurer', 'Club equipment', '', 'I got myself into a log-jam without a beaver', 'Danny Hignett', '03010185@napier.ac.uk', 'Landline 01312219975');
INSERT INTO `members05` VALUES(16, 'Quantity Surveying', 'Ladies Recurve Novice (RH)', 'Member', '', 'Portsmouth 373', '', 'Rachel Gallinagh', '05007379@napier.ac.uk', '07783426893');
INSERT INTO `members05` VALUES(17, 'BEng Software Engineering', 'Brute force and ignorance. Gents Rec/Comp Experienced (RH)', 'Committee Member', 'Alternative Compound; Hoyt TD4 + GM limbs; Various ACE\\''s and X7\\''s', 'Recurve - Portsmouth 561 (not at Napier), FITA 1 526 (not at Napier)<br>Compound - Portsmouth 571 (not at Napier), FITA1 551 (not at Napier), FITA 1296 (not at Napier), Albion 936', '', 'Ian Richardson', '05014573@napier.ac.uk', '07771934806');
INSERT INTO `members05` VALUES(18, 'Architectural Technology', 'Gents Recurve Novice (RH)', 'Member', 'Club equipment', 'Portsmouth 263', '', 'Gilbert Steele', '05007300@napier.ac.uk', '07929983367');
INSERT INTO `members05` VALUES(19, 'Civil Transportation Engineering', 'Gents Recurve Novice (RH)', 'Member', 'Club equipment', 'Portsmouth 329', '', 'Patrick Braham', '04005114@napier.ac.uk', '07783047978');
INSERT INTO `members05` VALUES(21, 'Business Management', 'Gents Compound Experienced (RH)', 'Member', '', 'Portsmouth 549', '', 'Jerome Grignon', '05008413@napier.ac.uk', '07783436754');
INSERT INTO `members05` VALUES(22, 'Transport Management', 'Ladies Recurve Novice (RH)', 'Member', 'Club equipment', '', '', 'Natasha Zelionkina', '05003586@napier.ac.uk', '07840344208');
INSERT INTO `members05` VALUES(23, 'Business Studies', 'Gents Recurve Novice (RH)', 'Member', 'Club equipment', 'Portsmouth 317', '', 'Paul McCaffrey', '02003369@napier.ac.uk', '07838241700');
INSERT INTO `members05` VALUES(33, 'Business Management', 'Gents Recurve Novice (RH)', 'Member', 'A one piece bow. Eek.', 'Portsmouth 505', '', 'Alastair MacDonald', 'macian92@hotmail.com', '07920462047');
INSERT INTO `members05` VALUES(34, 'Complementary Therapy (Reflexology)', 'Ladies Recurve Novice (LH)', 'Novice Rep', 'Club equipment', 'Portsmouth 311', '', 'Marie Esson', '05002099@napier.ac.uk', '07753162253');
INSERT INTO `members05` VALUES(35, 'BEng Civil and Transportation Engineering', 'Ladies Recurve Novice (RH)', 'Member', 'Club equipment', 'Portsmouth 313', '', 'Brenda O\\''Donoghue', 'brenda_odonoghue@yahoo.co.uk', '07840173557');
INSERT INTO `members05` VALUES(36, 'unknown', 'Gents Recurve Experienced (RH)', 'Member', '', 'Portsmouth 545 (at Napier)', '', 'Vincent Bille', '05015830@napier.ac.uk', '07726881518');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsid` bigint(20) NOT NULL AUTO_INCREMENT,
  `newsItem` text NOT NULL,
  `timestamp` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`newsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=308 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` VALUES(307, '2011/12 committee was elected at the AGM: Capt/Pres Ewan, Vice Captain Piotr, Vice President Jules, Equipment Niall, Coach Stewart, Comms George, Social vacant.', '1303386734');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quoteid` bigint(20) NOT NULL AUTO_INCREMENT,
  `memberid` bigint(20) NOT NULL DEFAULT '0',
  `quote` text NOT NULL,
  PRIMARY KEY (`quoteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` VALUES(1, 1, 'Ha Ha! Check out my man toys!');

-- --------------------------------------------------------

--
-- Table structure for table `quotes04`
--

CREATE TABLE `quotes04` (
  `quoteid` bigint(20) NOT NULL AUTO_INCREMENT,
  `memberid` bigint(20) NOT NULL DEFAULT '0',
  `quote` text NOT NULL,
  PRIMARY KEY (`quoteid`),
  FULLTEXT KEY `quote` (`quote`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quotes04`
--


-- --------------------------------------------------------

--
-- Table structure for table `quotes05`
--

CREATE TABLE `quotes05` (
  `quoteid` bigint(20) NOT NULL AUTO_INCREMENT,
  `memberid` bigint(20) NOT NULL DEFAULT '0',
  `quote` text NOT NULL,
  PRIMARY KEY (`quoteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `quotes05`
--

INSERT INTO `quotes05` VALUES(25, 4, 'If I\\''d known it was so feeble, I wouldn\\''t have shot it with a rocket launcher....');
INSERT INTO `quotes05` VALUES(2, 13, 'What an excellent piece of strange!');
INSERT INTO `quotes05` VALUES(4, 6, 'Can you still see it if you close both your eyes?');
INSERT INTO `quotes05` VALUES(5, 1, 'It came to me in a dream');
INSERT INTO `quotes05` VALUES(6, 4, 'Are you saying you\\''d prefer to sit on my long rod?');
INSERT INTO `quotes05` VALUES(7, 4, 'I\\''m not a perv, I\\''m a connoisseur of women');
INSERT INTO `quotes05` VALUES(8, 7, 'I don\\''t mind paying for it, I just can\\''t be bothered getting it up');
INSERT INTO `quotes05` VALUES(9, 8, 'Where\\''s my medal, eh?');
INSERT INTO `quotes05` VALUES(10, 12, 'Where\\''s the oil? There\\''s no oil!');
INSERT INTO `quotes05` VALUES(11, 15, 'I\\''ve gotten myself into a log jam without a beaver');
INSERT INTO `quotes05` VALUES(12, 17, 'Burnt house? No, thats what we had done that made us go out and find the pub in the first place!');
INSERT INTO `quotes05` VALUES(13, 14, 'It\\''s called the menopause by the way');
INSERT INTO `quotes05` VALUES(37, 13, 'Dance, monkey boy, dance.');
INSERT INTO `quotes05` VALUES(17, 16, 'it\\''s better to burp it and taste it than fart it and waste it!');
INSERT INTO `quotes05` VALUES(18, 13, 'If you tolerate Fife, your children will be next');
INSERT INTO `quotes05` VALUES(19, 13, 'I need to close my eyes and apply the jam');
INSERT INTO `quotes05` VALUES(20, 18, 'This bows and arrows stuff isnt going so good for me');
INSERT INTO `quotes05` VALUES(21, 21, 'Napier..... Naaapppiiieeerrrr!!!! NAPIEERRR!!!!');
INSERT INTO `quotes05` VALUES(28, 33, 'He is really fit actually... oh come on!');
INSERT INTO `quotes05` VALUES(23, 11, 'I love the smell of new electronic devices');
INSERT INTO `quotes05` VALUES(24, 1, 'Kneel to the webmaster');
INSERT INTO `quotes05` VALUES(26, 9, 'But I\\''m a woman I\\''m complicated');
INSERT INTO `quotes05` VALUES(27, 17, 'You\\''ve got both eyes closed, so you can only be using the force');
INSERT INTO `quotes05` VALUES(29, 17, 'If she\\''s a mouse, I\\''m a giant lump of cheese');
INSERT INTO `quotes05` VALUES(30, 8, 'I used to know a pig called Spotty');
INSERT INTO `quotes05` VALUES(31, 23, 'Let\\''s reopen Bar 12!');
INSERT INTO `quotes05` VALUES(32, 11, 'You could be Brenda!!');
INSERT INTO `quotes05` VALUES(33, 1, 'But I\\''m not Brenda!');
INSERT INTO `quotes05` VALUES(34, 9, 'Where and When on Wednesday...');
INSERT INTO `quotes05` VALUES(35, 21, 'Represent');
INSERT INTO `quotes05` VALUES(36, 11, 'Would anyone like my hot stuff?');
INSERT INTO `quotes05` VALUES(38, 17, 'Burger me up, woman');
INSERT INTO `quotes05` VALUES(40, 23, 'Can we put <a href=\\"http://www.kegless.co.uk\\">kegless</a> on the website? Can we put <a href=\\"http://www.kegless.co.uk\\">kegless</a> on the website? Can we put....');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_club_status`
--

CREATE TABLE `tbl_club_status` (
  `club_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_status_name` varchar(50) NOT NULL DEFAULT '',
  `club_status_description` text NOT NULL,
  PRIMARY KEY (`club_status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_club_status`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_graduation`
--

CREATE TABLE `tbl_graduation` (
  `member_id` int(11) NOT NULL DEFAULT '0',
  `season_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_graduation`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_first_name` varchar(50) NOT NULL DEFAULT '',
  `member_second_name` varchar(50) NOT NULL DEFAULT '',
  `member_photo_url` varchar(255) NOT NULL DEFAULT '',
  `member_matric_no` varchar(8) NOT NULL DEFAULT '',
  `member_course` varchar(255) NOT NULL DEFAULT '',
  `member_non-uni_email` varchar(255) NOT NULL DEFAULT '',
  `member_mobile` varchar(20) NOT NULL DEFAULT '',
  `member_SU_card_no` varchar(10) NOT NULL DEFAULT '',
  `member_GNAS_no` varchar(10) NOT NULL DEFAULT '',
  `member_interests` varchar(255) NOT NULL DEFAULT '',
  `member_notes` text NOT NULL,
  `member_LHRH` tinyint(1) NOT NULL DEFAULT '0',
  `member_poundage` tinyint(4) NOT NULL DEFAULT '0',
  `member_drawlenght` tinyint(4) NOT NULL DEFAULT '0',
  `member_equipment` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` VALUES(1, 'Craig', 'Atkin', '', '', 'Computing', '', '', '', '', '', '', 0, 0, 0, 'Win&Win Winstar + Club Arrows');
INSERT INTO `tbl_members` VALUES(2, 'Barrie', 'Cunning', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(3, 'Danny', 'Hignett', '', '', 'Herbal Medicine', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(4, 'David', 'Rowell', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(5, 'Drew', 'McNaughton', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(6, 'Jamie', 'Kelly', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(7, 'John', 'Aithie', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(8, 'Marie', 'Naesheim', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(9, 'Naomi', 'Thompson', '', '', 'MSc Drug Design', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(10, 'Phil', 'Roberts', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Win&Win Winact');
INSERT INTO `tbl_members` VALUES(11, 'Richard', 'Hamilton', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(12, 'Richard', 'Nicol', '', '', 'MSc Software Technology for the Web', '', '', '', '', '', '', 0, 0, 0, 'Spigarelli Item + Border XP10 limbs. Olympian arrows');
INSERT INTO `tbl_members` VALUES(13, 'Stewart', 'Barclay', '', '', 'MSc Software Engneering', '', '', '', '', '', '', 0, 0, 0, 'Hoyt Radian, Gemini stabilisers, Shibuya sight, Cartel 800s');
INSERT INTO `tbl_members` VALUES(14, 'Tony', 'Farrow', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(15, 'Yvonne', 'Bowman', '', '', 'Herbal Medicine', '', '', '', '', '', '', 0, 0, 0, '');
INSERT INTO `tbl_members` VALUES(16, 'Ross', 'Cranford', '', '', 'Some PhD or another', '', '', '', '', '', '', 0, 0, 0, 'SF Archery Riser, Easton A/C/C 620s and XX75s');
INSERT INTO `tbl_members` VALUES(17, 'Delphine', 'Aimard', '', '', 'Polymer Engineering', '', '', '', '', '', '', 0, 0, 0, 'Hoyt Matrix');
INSERT INTO `tbl_members` VALUES(18, 'George', 'Cort', '', '', 'Psychology', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(19, 'Iain', 'Caley', '', '', 'Civil and Timber Engineering', '', '', '', '', '', '', 0, 0, 0, 'Win&Win Winstar');
INSERT INTO `tbl_members` VALUES(20, 'Irina', 'Pasin', '', '', 'Transport Management', '', '', '', '', '', '', 0, 0, 0, 'Samick Agulla');
INSERT INTO `tbl_members` VALUES(21, 'Piotr', 'Wojtczuk', '', '', 'Electronic and Computer Engineering', '', '', '', '', '', '', 0, 0, 0, 'Win&Win Winstar');
INSERT INTO `tbl_members` VALUES(22, 'Rachel', 'Gallinagh', '', '', 'Quantity Surveying', '', '', '', '', '', '', 0, 0, 0, 'Samick Agulla');
INSERT INTO `tbl_members` VALUES(23, 'Ian', 'Richardson', '', '', 'Software Engineering', '', '', '', '', '', '', 0, 0, 0, 'Alternative Compund, Hoyt TD4');
INSERT INTO `tbl_members` VALUES(24, 'Gilbert', 'Steele', '', '', 'Architectural Technology', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(25, 'Patrick', 'Braham', '', '', 'Ciliv Transportation Engineering', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(26, 'Jerome', 'Grignon', '', '', 'Business Management', '', '', '', '', '', '', 0, 0, 0, '');
INSERT INTO `tbl_members` VALUES(27, 'Natasha', 'Zelionkina', '', '', 'Transport Management', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(28, 'Paul', 'McCaffrey', '', '', 'Business Studies', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(29, 'Alastair', 'MacDonald', '', '', 'Business Management', '', '', '', '', '', '', 0, 0, 0, 'A one piece wooden bow');
INSERT INTO `tbl_members` VALUES(30, 'Marie', 'Esson', '', '', 'Complementary Therapy (Reflexology)', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(31, 'Brenda', 'ODonoghue', '', '', 'Civil and Transportation Engineering', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(32, 'Vincent', 'Bille', '', '', '', '', '', '', '', '', '', 0, 0, 0, '');
INSERT INTO `tbl_members` VALUES(33, 'Stefan', 'Drasdo', '', '', 'Business Management', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(34, 'Anna', 'Basista', '', '', 'Psychology', '', '', '', '', '', '', 0, 0, 0, 'Hoyt Eclipse');
INSERT INTO `tbl_members` VALUES(35, 'Andrew', 'Pate', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(36, 'David', 'Lynch', '', '', 'Animal Biology', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(37, 'Christine', 'MacKay', '', '', 'Animal Biology', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(38, 'Joanna', 'Wincenciak', '', '', 'Psychology', '', '', '', '', '', '', 0, 0, 0, 'Sebastian Flute');
INSERT INTO `tbl_members` VALUES(39, 'Lydia', 'Herrod-Taylor', '', '', 'Accounting and Marketing Management', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(40, 'Sergii', 'Chmyrenko', '', '', 'Financial Services', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(41, 'Sergii', 'Semenov', '', '', 'Business Management', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(42, 'David', 'Timms', '', '', 'Accounting', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(43, 'Sarah', 'Henderson', '', '', 'Biomedical Sciences', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(44, 'David', 'Lange', '', '', '---', '', '', '', '', '', '', 0, 0, 0, 'Win&Win Expert');
INSERT INTO `tbl_members` VALUES(45, 'Daniella', 'Verell', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(46, 'Dara', 'Coward', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(47, 'Daniel', 'Wielding', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Hoyt Helix');
INSERT INTO `tbl_members` VALUES(48, 'David', 'Rae', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Win&Win Winstar');
INSERT INTO `tbl_members` VALUES(49, 'Sarah', 'Myatt', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(50, 'Kirsty', 'Topping', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(51, 'Mark', 'McKenzie', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(52, 'Gavin', 'Hay', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(53, 'Graham', 'Wark', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(54, 'Edmond', 'Cham', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Sebastian Flute');
INSERT INTO `tbl_members` VALUES(55, 'Stephen', 'Keegan', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(56, 'Sarah', 'Fairgrave', '', '', '', '', '', '', '', '', '', 0, 0, 0, '');
INSERT INTO `tbl_members` VALUES(57, 'Jinhang', 'Chen', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Win&Win InnoCarbon');
INSERT INTO `tbl_members` VALUES(58, 'Gemma', 'Hanson', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(59, 'Andrew', 'Brown', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(60, 'Katharina', 'Wade', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(61, 'Joe', 'Towers', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(62, 'Andy', 'Carroll', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(63, 'George', 'Ross', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(64, 'Louise', 'MacKay', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(65, 'George', 'Ross', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');
INSERT INTO `tbl_members` VALUES(66, 'Jennifer', 'Bruce', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'Club Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_seasons`
--

CREATE TABLE `tbl_members_seasons` (
  `member_id` int(11) NOT NULL DEFAULT '0',
  `season_id` int(11) NOT NULL DEFAULT '0',
  `club_status_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members_seasons`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_styles`
--

CREATE TABLE `tbl_members_styles` (
  `member_id` int(11) NOT NULL DEFAULT '0',
  `shooting_style_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members_styles`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_seasons`
--

CREATE TABLE `tbl_seasons` (
  `season_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `season_years` varchar(9) NOT NULL DEFAULT '',
  `season_summary` text NOT NULL,
  PRIMARY KEY (`season_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Season Lookup Table' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_seasons`
--

INSERT INTO `tbl_seasons` VALUES(1, '2004/2005', 'The first academic year of NUAC existance!');
INSERT INTO `tbl_seasons` VALUES(2, '2005/2006', 'The first full season run by NUAC. We trained at Queen Margaret and hardly had any equipment.');
INSERT INTO `tbl_seasons` VALUES(3, '2006/2007', 'Hooooray! We finally are able to train at our home indoor venue - Sighthill Sports Dome!!');
INSERT INTO `tbl_seasons` VALUES(4, '2007/2008', 'Well, The Dome did not last for that long in NUACs history. However some impressive scores and an outdoor venue kind of compensate for that.');
INSERT INTO `tbl_seasons` VALUES(5, '2008/2009', '');
INSERT INTO `tbl_seasons` VALUES(6, '2009/2010', '');
INSERT INTO `tbl_seasons` VALUES(7, '2010/2011', '');
INSERT INTO `tbl_seasons` VALUES(8, '2011/2012', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shooting_style`
--

CREATE TABLE `tbl_shooting_style` (
  `shooting_style_id` int(11) NOT NULL AUTO_INCREMENT,
  `shooting_style_name` varchar(50) NOT NULL DEFAULT '',
  `shooting_style_dscpn` text NOT NULL,
  `shooting_style_img_url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`shooting_style_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_shooting_style`
--

