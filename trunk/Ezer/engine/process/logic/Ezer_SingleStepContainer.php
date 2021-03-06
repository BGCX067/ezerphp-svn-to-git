<?php
/**
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please send
 * e-mail to johnathan.kanarek@gmail.com
 */


/**
 * Purpose:     Store in the memory the definitions of a step container with a single step only
 * @author Tan-Tan
 * @package Engine
 * @subpackage Process.Logic
 */
abstract class Ezer_SingleStepContainer extends Ezer_StepContainer
{
	public function &createInstance(Ezer_ScopeInstance &$scope_instance)
	{
		$ret = new Ezer_SingleStepContainer($scope_instance, $this);
		return $ret;
	}
	
	public function addStep(Ezer_Step &$step)
	{
		if(count($this->steps))
			throw new Ezer_TooManyStepsException(get_class($this));
			
		// overwrite any flow definition
		$step->in_flows = array();
		$step->out_flows = array();
		
		parent::addStep($step);
	}
}

